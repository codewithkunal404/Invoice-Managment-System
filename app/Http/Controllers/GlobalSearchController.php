<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = trim($request->input('q', ''));
        $module = $request->input('module'); // optional

        if ($query === '') {
            return response()->json([]);
        }

        $results = [];

        foreach (config('searchable', []) as $moduleName => $config) {

            // ✅ Filter by selected module (optional)
            if (!empty($module) && $module !== $moduleName) {
                continue;
            }

            // ✅ Safety check (avoid runtime errors)
            if (
                empty($config['table']) ||
                empty($config['fields']) ||
                empty($config['route']) ||
                empty($config['route_param'])
            ) {
                continue;
            }

            $records = DB::table($config['table'])
                ->where(function ($q) use ($config, $query) {
                    foreach ($config['fields'] as $field) {
                        $q->orWhere($field, 'LIKE', '%' . $query . '%');
                    }
                })
                ->limit(5)
                ->get();

            foreach ($records as $record) {

                // Build readable text
                $text = collect($config['fields'])
                    ->map(fn($field) => $record->$field ?? null)
                    ->filter()
                    ->implode(' | ');

                if (!$text) {
                    continue;
                }

                $results[] = [
                    'module' => $moduleName,
                    'text' => $text,
                    'link' => route(
                        $config['route'],
                        $record->{$config['route_param']}
                    ),
                ];
            }
        }

        return response()->json($results);
    }
}
