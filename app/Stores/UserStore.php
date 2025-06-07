<?php
namespace App\Stores;
use Illuminate\Support\Facades\Session;

class UserStore
{
  protected string $key = 'user_store';

  /**
   * Set the full store array (overwrites).
   */
  public function set(array $data): void
  {
    Session::put($this->key, $data);
  }

  /**
   * Get the full store array.
   */
  public function get(): array
  {
    return Session::get($this->key, []);
  }

  /**
   * Clear the store entirely.
   */
  public function clear(): void
  {
    Session::forget($this->key);
  }

  /**
   * Set a specific attribute in the store.
   */
  public function setAttribute(string $field, mixed $value): void
  {
    $store = $this->get();
    $store[$field] = $value;
    $this->set($store);
  }

  /**
   * Get a specific attribute.
   */
  public function getAttribute(string $field): mixed
  {
    return $this->get()[$field] ?? null;
  }

  /**
   * Check if a specific key exists.
   */
  public function has(string $field): bool
  {
    return array_key_exists($field, $this->get());
  }

  /**
   * Remove a specific attribute.
   */
  public function removeAttribute(string $field): void
  {
    $store = $this->get();
    unset($store[$field]);
    $this->set($store);
  }
}
