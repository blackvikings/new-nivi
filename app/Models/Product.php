<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = ['name', 'slug', 'sortDescription', 'description', 'price', 'quantity', 'category', 'image'];

    protected $casts = ['image' => 'array'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug($value, '-');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "uploads/product-images";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path)
    {
//        $request = \Request::instance();
//        $attribute_value = (array) $this->{$attribute_name};
//        $files_to_clear = $request->get('clear_'.$attribute_name);
//        // if a file has been marked for removal,
//        // delete it from the disk and from the db
//        if ($files_to_clear) {
//            $attribute_value = (array) $this->{$attribute_name};
//            foreach ($files_to_clear as $key => $filename) {
//                \Storage::disk($disk)->delete($filename);
//                $attribute_value = array_where($attribute_value, function ($value, $key) use ($filename) {
//                    return $value != $filename;
//                });
//            }
//        }
//        // if a new file is uploaded, store it on disk and its filename in the database
//        if ($request->hasFile($attribute_name)) {
//            foreach ($request->file($attribute_name) as $file) {
//                if ($file->isValid()) {
//                    // 1. Generate a new file name
//                    $new_file_name = $file->getClientOriginalName();
//                    // 2. Move the new file to the correct path
//                    $file_path = $file->storeAs($destination_path, $new_file_name, $disk);
//                    // 3. Add the public path to the database
//                    $attribute_value[] = $file_path;
//                }
//            }
//        }
//        $this->attributes[$attribute_name] = json_encode($attribute_value);


        if (! is_array($this->{$attribute_name})) {
            $attribute_value = json_decode($this->{$attribute_name}, true) ? [] : [];
        } else {
            $attribute_value = $this->{$attribute_name};
        }
        $files_to_clear = request()->get('clear_'.$attribute_name);

        // if a file has been marked for removal,
        // delete it from the disk and from the db
        if ($files_to_clear) {
            foreach ($files_to_clear as $key => $filename) {
                \Storage::disk($disk)->delete($filename);
                $attribute_value = Arr::where($attribute_value, function ($value, $key) use ($filename) {
                    return $value != $filename;
                });
            }
        }

        // if a new file is uploaded, store it on disk and its filename in the database
        if (request()->hasFile($attribute_name)) {
            foreach (request()->file($attribute_name) as $file) {
                if ($file->isValid()) {
                    // 1. Generate a new file name
                    $new_file_name = md5($file->getClientOriginalName().random_int(1, 9999).time()).'.'.$file->getClientOriginalExtension();

                    // 2. Move the new file to the correct path
                    $file_path = $file->storeAs($destination_path, $new_file_name, $disk);

                    // 3. Add the public path to the database
                    $attribute_value[] = $file_path;
                }
            }
        }

        $this->attributes[$attribute_name] = json_encode($attribute_value);
    }

}
