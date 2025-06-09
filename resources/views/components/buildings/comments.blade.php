<div>
  @foreach ($comments as $comment)
    <div class="mb-20 xl:mb-30 last:mb-0">
      {{ $comment->created_at->format('d.m.Y – H:i') }}
      <p>{{ $comment->comment }}</p>
    </div>
  @endforeach
</div>