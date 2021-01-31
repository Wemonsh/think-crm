<?php

namespace App\Providers;

use App\Repository\DocumentFlow\CounterpartyRepositoryInterface;
use App\Repository\DocumentFlow\DocumentRepositoryInterface;
use App\Repository\DocumentFlow\JournalRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\DocumentFlow\CounterpartyRepository;
use App\Repository\Eloquent\DocumentFlow\DocumentRepository;
use App\Repository\Eloquent\DocumentFlow\JournalRepository;
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
        $this->app->bind(JournalRepositoryInterface::class, JournalRepository::class);
        $this->app->bind(DocumentRepositoryInterface::class, DocumentRepository::class);
        $this->app->bind(CounterpartyRepositoryInterface::class, CounterpartyRepository::class);
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
