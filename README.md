# Changelog

## Installation

1) Add the package to your project. 
```console
composer require webbundels/changelog
```

2) Migrate the database.
```console
php artisan migrate
```

## View permissions
1) Add the method 'getChangelogViewableAttribute' to your user model.
2) Write logic in this method that determines if the user can view the changelog page.

```php
public function getChangelogViewableAttribute() :boolean
{
    return $this->can('view_changelog');
}
```

## Edit permissions
1) Add the method 'getChangelogEditableAttribute' to your user model.
2) Write logic in this method that determines if the user can edit the changelog page.

```php
public function getChangelogEditableAttribute() :boolean
{
    return $this->can('edit_changelog');
}
```
