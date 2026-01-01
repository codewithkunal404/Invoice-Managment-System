<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityHelper;
use App\Helpers\ErrorHelper;
use App\Models\EmailLayout;
use App\Models\EmailSetting;
use App\Models\EmailTemplate;
use App\Models\TinyMCE;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class EmailController extends Controller
{
    public function edit()
    {
        $config = EmailSetting::first();
        return view('email.edit', compact('config'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'mailer' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
            'encryption' => 'nullable|string|max:50',
            'from_name' => 'required|string|max:255',
            'from_email' => 'required|email|max:255',
            'is_active' => 'required|boolean',
        ]);

        $config = EmailSetting::first() ?? new EmailSetting();
        $password = $request->password ?? $config->password;
        $config->fill($request->all());
        $config->password = $password;
        $config->save();
        return redirect()->back()->with('success', 'Email Setting Updated Successfully.');
    }

    public function test($id)
    {
        $config = EmailSetting::findOrFail($id);

        try {
            // Build SMTP transport
            $transport = new EsmtpTransport(
                $config->host,
                $config->port,
                $config->encryption === 'ssl'
            );

            $transport->setUsername($config->username);
            $transport->setPassword($config->password);
            // Open connection (THIS is the real test)
            $transport->start();
            ActivityHelper::log(
                'SMTP TEST',
                'EMAIL',
                $config->id,
                'Email configuration test successful'
            );
            return redirect()->back()
                ->with('success', 'SMTP connection successful ✅');

        } catch (TransportExceptionInterface $e) {

            ErrorHelper::log('SMTP TEST', $e);

            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'SMTP connection failed ❌ : ' . $e->getMessage()
                ]);
        }
    }


    public function editTemplate($id)
    {
        $template = EmailTemplate::findOrFail($id);

        $layouts = EmailLayout::where('is_active', true)->get();

        return view('email.email_templates.form', compact('template', 'layouts'));
    }


    public function listTemplates()
    {
        $templates = EmailTemplate::with('layout')->orderBy('created_at', 'desc')->get();
        return view('email.email_templates.index', compact('templates'));
    }

    // List all email layouts
    public function listLayouts()
    {
        $layouts = EmailLayout::orderBy('created_at', 'desc')->get();
        return view('email.email_layouts.index', compact('layouts'));
    }
    public function storeTemplate(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body_html' => 'required|string',
            'email_layout_id' => 'nullable|exists:email_layouts,id',
            'variables' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Convert variables to array
        $data['variables'] = !empty($data['variables'])
            ? array_map('trim', explode(',', $data['variables']))
            : [];

        $template = new EmailTemplate();
        $template->fill($data);
        $template->is_active = $request->has('is_active');
        $template->save();

        return redirect()
            ->route('email-templates.edit', $template->id)
            ->with('success', 'Email template created successfully');
    }

    public function createTemplate()
    {
        $layouts = EmailLayout::where('is_active', true)->get();
        return view('email.email_templates.form', compact('layouts'));
    }

    public function createLayout()
    {
        return view('email.email_layouts.form');
    }
    public function storeLayout(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'header_html' => 'nullable|string',
            'footer_html' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $layout = new EmailLayout();
        $layout->fill($data);
        $layout->is_active = $request->has('is_active');
        $layout->save();

        return redirect()
            ->route('email-layouts.edit', $layout->id)
            ->with('success', 'Email layout created successfully');
    }

    /**
     * Update template
     */
    public function updateTemplate(Request $request, $id)
    {
        $template = EmailTemplate::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body_html' => 'required|string',
            'email_layout_id' => 'nullable|exists:email_layouts,id',
            'variables' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        // Convert variables to array
        $data['variables'] = !empty($data['variables'])
            ? array_map('trim', explode(',', $data['variables']))
            : [];

        $data['is_active'] = $request->has('is_active');

        $template->update($data);

        return redirect()
            ->route('email-templates.index', $template->id)
            ->with('success', 'Email template updated successfully');
    }

    public function editLayout($id)
    {
        $layout = EmailLayout::findOrFail($id);
        return view('email.email_layouts.form', compact('layout'));
    }
    public function updateLayout(Request $request, $id)
    {
        $layout = EmailLayout::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'header_html' => 'nullable|string',
            'footer_html' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $layout->update($data);

        return redirect()
            ->route('email-layouts.index', $layout->id)
            ->with('success', 'Email layout updated successfully');
    }


    public function destroyTemplate(EmailTemplate $template)
    {
        try {
            $template->delete();
            return redirect()
                ->route('email-templates.index')
                ->with('success', 'Email template deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->route('email-templates.index')
                ->withErrors(['error' => 'Failed to delete template: ' . $e->getMessage()]);
        }
    }

    public function destroyLayout(EmailLayout $layout)
{
    try {
        $layout->delete();
        return redirect()
            ->route('email-layouts.index')
            ->with('success', 'Email layout deleted successfully.');
    } catch (\Exception $e) {
        return redirect()
            ->route('email-layouts.index')
            ->withErrors(['error' => 'Failed to delete layout: ' . $e->getMessage()]);
    }
}

public function editTinyMCE()
    {
        $config = TinyMCE::first();
        return view('tinymice.edit', compact('config'));
    }

    public function updateTinyMCE(Request $request)
    {
        $request->validate([
            'tinymce_api_key' => 'required|string|max:255',
        ]);

        $config = TinyMCE::first() ?? new TinyMCE();
        $config->api_key = $request->tinymce_api_key;
        $config->save();
        return redirect()->back()->with('success', 'TinyMCE API Key Updated Successfully.');
}
}

