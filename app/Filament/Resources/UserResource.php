<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Tabs::make('foo')
                    ->activeTab(1)
                    ->tabs([
                        Infolists\Components\Tabs\Tab::make('foo')
                            ->visible(fn () => auth()->user()->name === 'Test User')
                            ->schema([
                                Infolists\Components\TextEntry::make('foo')
                                    ->state('foo'),
                            ]),
                        Infolists\Components\Tabs\Tab::make('bar')
                            ->schema([
                                Infolists\Components\TextEntry::make('bar')
                                    ->state('bar'),
                            ]),
                        Infolists\Components\Tabs\Tab::make('baz')
                            ->schema([
                                Infolists\Components\TextEntry::make('baz')
                                    ->state('baz'),
                            ]),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
}
