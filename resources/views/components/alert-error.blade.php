<div class="alert my-3 mx-3 flex flex-row items-center bg-{{ $bgColor }} p-5 rounded border-b-2 border-{{ $borderColor }}">
    <div class="alert-icon flex items-center bg-{{ $iconBgColor }} border-2 border-{{ $iconBorderColor }} justify-center h-10 w-10 flex-shrink-0 rounded-full">
        <span class="text-{{ $iconColor }}">
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </span>
    </div>
    <div class="alert-content ml-4">
        <div class="alert-title font-semibold text-lg text-{{ $titleColor }}">
            {{ $title }}
        </div>
        <div class="alert-description text-sm text-{{ $descriptionColor }}">
            {{ $description }}
        </div>
    </div>
</div>