@extends('layout.app')

@section('content')
    <div class="container">
        <h3>Email Template Editor</h3>

        <form method="POST"
            action="{{ isset($template) ? route('email-templates.update', $template->id) : route('email-templates.store') }}">
            @csrf
            @isset($template) @method('PUT') @endisset

            <!-- Template Name -->
            <div class="mb-3">
                <label class="form-label">Template Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $template->name ?? '') }}"
                    required>
            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control"
                    value="{{ old('subject', $template->subject ?? '') }}" required>
            </div>

            <!-- Variables -->
            <div class="mb-3">
                <label class="form-label">Available Variables</label>
                <input type="text" name="variables" class="form-control" placeholder="invoice_no, amount, customer_name"
                    value="{{ old('variables', isset($template) ? implode(',', $template->variables ?? []) : '') }}">
            </div>

            <!-- Active Checkbox -->
            <div class="mb-3 form-check">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1"
                    @checked(old('is_active', $template->is_active ?? false))>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <!-- Layout -->
            <div class="mb-3">
                <label class="form-label">Layout (Header/Footer)</label>
                <select name="email_layout_id" id="email_layout_id" class="form-control">
                    <option value="">None</option>
                    @foreach($layouts as $layout)
                        <option value="{{ $layout->id }}" @selected(old('email_layout_id', $template->email_layout_id ?? '') == $layout->id)>
                            {{ $layout->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Editor & Live Preview -->
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Email HTML (Live Edit)</label>
                    <textarea id="editor" name="body_html" class="form-control"
                        rows="14">{{ old('body_html', $template->body_html ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Live Preview</label>
                    <iframe id="preview" class="w-100 border" style="height:400px;"></iframe>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Save Template</button>
        </form>
    </div>

    <!-- Pass layout header/footer to JS -->
    <script>
        const layouts = @json($layouts->mapWithKeys(fn($l) => [$l->id => ['header' => $l->header_html, 'footer' => $l->footer_html]]));
    </script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/{{fn_get_tinymce_key()}}/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            height: 400,

            plugins: `
            link table code preview lists advlist autolink
            paste fullscreen visualblocks
        `,

            toolbar: `
            undo redo |
            bold italic underline |
            alignleft aligncenter alignright |
            bullist numlist |
            table link |
            code preview fullscreen
        `,

            menubar: false,
            branding: false,

            /* 🔥 THIS IS THE IMPORTANT PART 🔥 */
            valid_elements: '*[*]',          // allow all HTML tags + attributes
            extended_valid_elements: '*[*]',
            valid_children: '+body[style],+style',

            forced_root_block: false,        // stop auto <p> wrapping
            verify_html: false,              // DO NOT sanitize HTML
            cleanup: false,                  // DO NOT remove tags
            convert_urls: false,
            remove_script_host: false,

            paste_as_text: false,
            paste_data_images: true,

            content_style: `
            body { font-family: Arial, sans-serif; }
            table { border-collapse: collapse; width: 100%; }
            td, th { border: 1px solid #ccc; padding: 8px; }
        `,

            setup: function (editor) {
                editor.on('change keyup input', function () {
                    editor.save();
                    updatePreview();
                });
            }
        });
    </script>

    <!-- Live Preview -->
    <script>
        const preview = document.getElementById('preview');
        const layoutSelect = document.getElementById('email_layout_id');

        function updatePreview() {
            const doc = preview.contentDocument || preview.contentWindow.document;
            doc.open();

            // Get selected layout header/footer
            const selectedLayoutId = layoutSelect.value;
            const headerHtml = selectedLayoutId && layouts[selectedLayoutId] ? layouts[selectedLayoutId].header : '';
            const footerHtml = selectedLayoutId && layouts[selectedLayoutId] ? layouts[selectedLayoutId].footer : '';

            // Get editor content
            const editorContent = tinymce.get('editor') ? tinymce.get('editor').getContent() : document.getElementById('editor').value;

            doc.write(headerHtml + editorContent + footerHtml);
            doc.close();
        }

        // Update on layout change
        layoutSelect.addEventListener('change', updatePreview);

        // Initial render after TinyMCE init
        setTimeout(updatePreview, 500);
    </script>
@endsection