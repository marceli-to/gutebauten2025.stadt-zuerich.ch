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

  /**
   * Check if user has voted for a building.
   */
  public function hasVote(int $buildingId): bool
  {
    $votes = $this->getAttribute('votes') ?? [];
    return in_array($buildingId, $votes);
  }

  /**
   * Add a building ID to the vote list.
   */
  public function addVote(int $buildingId): void
  {
    $votes = $this->getAttribute('votes') ?? [];

    if (!in_array($buildingId, $votes)) {
      $votes[] = $buildingId;
      $this->setAttribute('votes', $votes);
    }
  }

  /**
   * Remove a building ID from the vote list.
   */
  public function removeVote(int $buildingId): void
  {
    $votes = $this->getAttribute('votes') ?? [];

    if (($key = array_search($buildingId, $votes)) !== false) {
      unset($votes[$key]);
      $this->setAttribute('votes', array_values($votes));
    }
  }
}
