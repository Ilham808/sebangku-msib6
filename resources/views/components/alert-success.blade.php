<div class="alert my-3 mx-3 flex flex-row items-center bg-{{ $bgColor }} p-5 rounded border-b-2 border-{{ $borderColor }}">
    <div class="alert-icon flex items-center bg-{{ $iconBgColor }} border-2 border-{{ $iconBorderColor }} justify-center h-10 w-10 flex-shrink-0 rounded-full">
        <span class="text-{{ $iconColor }}">
            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
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