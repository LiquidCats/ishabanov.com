<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Admin\Presentation\Http\Requests\FileStoreRequest;
use App\Data\Database\Eloquent\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

use function redirect;
use function route;
use function sha1_file;

class FilesStoreController extends Controller
{
    public function __invoke(FileStoreRequest $request): RedirectResponse
    {
        $file = $request->file('file');

        $filepath = $file->store('media', ['disk' => 'public']);

        if ($filepath === false) {
            return redirect('admin.files.store')
                ->withInput()
                ->withErrors(['file' => ['Unable to upload file']]);
        }

        $model = new File();

        $model->hash = sha1_file($file->path());
        $model->type = $file->getMimeType();
        $model->path = $filepath;
        $model->file_size = $file->getSize();
        $model->extension = $file->getClientOriginalExtension();
        $model->name = $request->validated('name');

        $model->save();

        return redirect(route('admin.files.create'));
    }
}
