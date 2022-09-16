<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;

class UploadFile
{
    /**
     * Method Upload File.
     * 
     * @param object $files
     * @param string $folder
     * 
     * @return string
     */
    public static function upload($files, $folder)
    {
        // Validate Parameter
        if (empty($files) || empty($folder))
            return null;

        // Check Folder have Created ?
        $path = public_path($folder);
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        // Validate Parameter OK ---> todo process logic (Upload File)
        if (is_array($files)) { // Upload multiple file
            // Define Variable
            $filesPath = [];

            foreach ($files as $file) {
                // Get Extension (.png, jpg, jpeg, ...)
                $extension = $file->extension();

                // Convert string to lowercase
                $extension = strtolower($extension);

                // Set fileName
                $fileName = 'product_image_' . time() . str_shuffle(rand()) . '.' . $extension;

                // upload file to server
                $file->move($folder, $fileName);

                // Set filePath
                $filePath = $folder . '/' . $fileName;

                // Add Element into Array
                $filesPath[] = $filePath;
            }

            // Return
            return $filesPath;
        } else { // Upload single file
            // Get Extension (.png, jpg, jpeg, ...)
            $extension = $files->extension();

            // Convert string to lowercase
            $extension = strtolower($extension);

            // Set fileName
            $fileName = 'thumbnail_' . time() . '.' . $extension;

            // Upload file to server
            $files->move($folder, $fileName);

            // Set filePath
            $filePath = $folder . '/' . $fileName;

            // Return
            return $filePath;
        }
    }

    /**
     * Method Remove File.
     * 
     * @param string|array $files
     * 
     * @return boolean
     */
    public static function remove($files)
    {
        // Check Parameter
        if (empty($files))
            return false;

        if (is_array($files)) { // Delete multiple file
            foreach ($files as $file) {
                if (File::exists(public_path($file))) {
                    File::delete(public_path($file));
                }
            }
        } else { // Delete single file
            if (File::exists(public_path($files))) {
                File::delete(public_path($files));
            }
        }

        // Return
        return true;
    }
}