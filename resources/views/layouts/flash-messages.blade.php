@php
    use App\Services\FlashMessageService;

    /** @var FlashMessageService $flashMessageService */
    $flashMessageService = app(FlashMessageService::class);
@endphp
@if ($flashMessageService->hasMessage())
    <div class="content-container flash-message @if($flashMessageService->isError()) error @endif">
        <ul>
            <li>{!! $flashMessageService->getMessage() !!}</li>
        </ul>
    </div>
@endif
