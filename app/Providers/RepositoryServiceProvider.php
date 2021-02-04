<?php

namespace App\Providers;

use App\Repository\DocumentFlow\DocumentCorrespondentRepositoryInterface;
use App\Repository\DocumentFlow\DocumentImportanceRepositoryInterface;
use App\Repository\DocumentFlow\DocumentIncomingRepositoryInterface;
use App\Repository\DocumentFlow\DocumentOutgoingRepositoryInterface;
use App\Repository\DocumentFlow\DocumentTypeRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\DocumentFlow\DocumentCorrespondentRepository;
use App\Repository\Eloquent\DocumentFlow\DocumentImportanceRepository;
use App\Repository\Eloquent\DocumentFlow\DocumentIncomingRepository;
use App\Repository\Eloquent\DocumentFlow\DocumentOutgoingRepository;
use App\Repository\Eloquent\DocumentFlow\DocumentTypeRepository;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(DocumentCorrespondentRepositoryInterface::class, DocumentCorrespondentRepository::class);
        $this->app->bind(DocumentImportanceRepositoryInterface::class, DocumentImportanceRepository::class);
        $this->app->bind(DocumentIncomingRepositoryInterface::class, DocumentIncomingRepository::class);
        $this->app->bind(DocumentOutgoingRepositoryInterface::class, DocumentOutgoingRepository::class);
        $this->app->bind(DocumentTypeRepositoryInterface::class, DocumentTypeRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
