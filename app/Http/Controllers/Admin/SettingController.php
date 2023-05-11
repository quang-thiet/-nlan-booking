<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\UploadService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(protected Setting $setting)
    {
    }

    public function edit()
    {
        $setting = $this->setting
            ->newQuery()
            ->firstOrCreate(['id' => 1], [
                'name' => 'Booking',
                'logo' => 'Default.png',
                'phone' => '0987654321',
                'map' => 'link map',
                'address' => 'Địa chỉ',
                'email' => 'Email',
                'author_name' => 'Chủ website'
            ]);

        return view('screens.admin.setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $data = $request->only([
            'name',
            'phone',
            'map',
            'address',
            'email',
            'author_name'
        ]);

        if ($request->has('logo')) {
            $data['logo'] = UploadService::upload($request->logo, 'logo');
        }

        $setting = $this->setting
                        ->newQuery()
                        ->first();

        $setting->update($data);

        return back()
                ->with('success', 'Cập nhật thành công');
    }
}
