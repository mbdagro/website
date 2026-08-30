<?php

namespace App\Helper;

use App\Models\CommunicationStatus;
use App\Models\ContactCategory;
use App\Models\Currency;
use App\Models\LeadStatus;
use App\Models\Profession;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\VisitPlace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helper
{

    public static function uploadAttachment($files, $baseFolder = 'vouchers', $oldAttachments = null)
    {
        $disk = config('filesystems.voucher_disk', 'public');
        $uploadedPaths = [];

        // 1️⃣ Delete old attachments if they exist
        if (!empty($oldAttachments)) {
            $oldFiles = json_decode($oldAttachments, true);

            if (is_array($oldFiles)) {
                foreach ($oldFiles as $oldFile) {
                    if (Storage::disk($disk)->exists($oldFile)) {
                        Storage::disk($disk)->delete($oldFile);
                    }
                }
            } elseif (is_string($oldAttachments) && Storage::disk($disk)->exists($oldAttachments)) {
                // Single string path case
                Storage::disk($disk)->delete($oldAttachments);
            }
        }

        // 2️⃣ Normalize single file to array
        if (!is_array($files)) {
            $files = [$files];
        }

        // 3️⃣ Upload each file
        foreach ($files as $file) {
            if (!$file->isValid()) {
                continue;
            }

            if(Str::startsWith($baseFolder, ['billing', 'vouchers'])) {
                $folderPath = $baseFolder . '/' . date('Y') . '/' . date('m');
            }else{
                $folderPath = $baseFolder;
            }

            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = uniqid() . '.' . $extension;
            $relativePath = $folderPath . '/' . $fileName;

            $fileSizeInMB = $file->getSize() / 1024 / 1024;

            // Compress if image > 2MB
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp']) && $fileSizeInMB > 2) {
                $tempPath = sys_get_temp_dir() . '/' . $fileName;
                $image = \Intervention\Image\Facades\Image::make($file->getRealPath());
                $image->save($tempPath, 60);
                Storage::disk($disk)->put($relativePath, file_get_contents($tempPath));
                @unlink($tempPath);
            } else {
                Storage::disk($disk)->putFileAs($folderPath, $file, $fileName);
            }

            $uploadedPaths[] = $relativePath;
        }

        // 4️⃣ Return JSON if multiple, string if single
        return count($uploadedPaths) > 1 ? json_encode($uploadedPaths) : $uploadedPaths[0];
    }
    public static function currentCurrency()
    {
        return Currency::find(Auth::user()?->Branch?->currency_id)
            ?? Currency::where('code', 'BDT')->first();
    }

    public static function getContactCategory()
    {
        return ContactCategory::get();
    }

    public static function getUser()
    {
        return User::whereNotIn('type', ['Customer', 'Shareholder', 'Investor'])->visible()->get();
    }

    public static function getProfession()
    {
        return Profession::get();
    }
    public static function getLeadStatus()
    {
        return LeadStatus::orderBy('id', 'desc')->get();
    }

    public static function getCommunicationStatus()
    {
        return CommunicationStatus::get();
    }

    public static function getTaskStatus()
    {
        return TaskStatus::orderBy('id', 'desc')->get();
    }

    public static function getVisitPlaces()
    {
        return VisitPlace::orderBy('id', 'desc')->get();
    }
}
