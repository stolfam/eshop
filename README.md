# E-shop PHP classes
Universal PHP Classes for e-shop system.

## Requirements
- PHP 7.4

## Install
```
composer install stolfam/eshop
```

## What's inside?
Now this package includes classes for:
- Cart
    - CartStorage (interface)
- Products
    - Attributes (interfaces)
- Orders
    - Status history
- Customers
    - Addreses
- Roles
- Tags
- Repositories (interfaces)

## How to use it?
As you want and as you need.
I recommend creating your own classes and implementing all interfaces (repositories, attributes).
For example:
```
class MyAttribute implements IAttribute {
    // here would be your implementation
}
```