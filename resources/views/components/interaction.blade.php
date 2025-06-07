<div id="interaction-app">
  <user-interaction
    id="{{ $id }}"
    slug="{{ $slug }}"
    title="{{ $title }}"
    share_url="{{ $shareUrl }}"
    has_vote="false"
  ></user-interaction>
</div>
@vite('resources/js/interaction.js')
{{-- <user-interaction
id="{{ $id }}"
title="{{ $title }}"
share_url="{{ $shareUrl }}"
has_vote="{{ $hasVote ? 'true' : 'false' }}"
></user-interaction> --}}