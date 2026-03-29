# Payment Gateway App (Laravel)

## Overview

This project is a **Payment Gateway System** built using Laravel, designed to demonstrate **clean architecture, Service Container usage, and dependency injection**.

The main goal of this project is to show how to build a **flexible and scalable payment system** where payment methods can be changed **without modifying controller logic**.no

---

## Key Features

* Multiple payment methods:

  * bKash
  * Nagad
  * Stripe
  * Cash
  and so on.
* Dynamic payment resolution using **Service Container**
* Interface-based design (**loosely coupled architecture**)
* Clean and maintainable code structure
* Easy to extend with new payment gateways

---

## Core Concepts Used

This project focuses on the following Laravel concepts:

* Service Container (Dependency Injection)
* Service Providers
* Interface-based design (Contracts)
* Strategy Pattern
* Clean Architecture principles

---

## Project Structure

```
app/
 ├── Services/
 │     └── Payment/
 │           ├── Contracts/
 │           │     └── PaymentInterface.php
 │           ├── BkashPayment.php
 │           ├── StripePayment.php
 │           └── CashPayment.php
 ├── Http/
 │     └── Controllers/
 │           └── OrderController.php
 ├── Providers/
 │     └── AppServiceProvider.php
```

---

## How It Works

### 1. Interface (Contract)

All payment methods follow a common contract:

```php
interface PaymentInterface {
    public function pay($amount);
}
```

---

### 2. Payment Implementations

Each payment method implements the interface:

* `BkashPayment`
* `StripePayment`
* `CashPayment`

---

### 3. Service Container Binding

The system dynamically resolves the payment method based on user request:

```php
$this->app->bind(PaymentInterface::class, function ($app) {
    $method = request()->input('payment_method');

    return match ($method) {
        'bkash' => new BkashPayment(),
        'stripe' => new StripePayment(),
        'cash' => new CashPayment(),
        default => throw new Exception("Invalid payment method"),
    };
});
```

---

### 4. Controller (Clean & Decoupled)

```php
class OrderController extends Controller
{
    protected $payment;

    public function __construct(PaymentInterface $payment) {
        $this->payment = $payment;
    }

    public function placeOrder(Request $request) {
        $amount = 500;
        return response()->json([
            'message' => $this->payment->pay($amount)
        ]);
    }
}
```
### Request Body

```json
{
  "payment_method": "bkash"
}
```

### Supported Values

* `bkash`
* `stripe`
* `cash`

---

### Example Response

```json
{
  "message": "Paid 500 via bKash"
}
```

---

## Why This Approach?

### Loose Coupling

Controllers depend on **interfaces**, not concrete classes.

### Easy to Extend

Add a new payment method without changing existing code.

### Clean Code

Business logic is separated from controllers.

### Testable

Easy to mock payment services in testing.

---

## Future Improvements

* Store payment records in database
* Add payment status tracking (success, failed, pending)
* Integrate real payment gateways (SSLCommerz, Stripe API)
* Add refund functionality
* Implement Repository Pattern
* Add authentication (JWT / OAuth)

---

## Use Case

This architecture is commonly used in:

* eCommerce applications
* Food delivery apps (like Foodpanda)
* Subscription systems
* SaaS platforms

---