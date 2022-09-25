@props(['month', 'selectedDate' => null])

<table class="m-auto text-xs text-center month">
    <thead>
        <tr>
            @foreach ($month->weekdays() as $index => $day)
                <th>
                    @if ($selectedDate)
                        <a
                            href="{{ $month->weekdayPath($selectedDate, $index) }}"
                            class="block py-0.5 hover:bg-gray-300 {{ $month->weekday($selectedDate, $index)->is($selectedDate) ? 'font-bold bg-gray-200' : '' }}"
                        >
                            {{ $day }}
                        </a>
                    @else
                        <span class="block py-0.5">
                            {{ $day }}
                        </span>
                    @endif
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($month->weeks() as $days)
            <tr class="{{ $selectedDate && $days->filter(fn ($day) => $day->date->is($selectedDate))->isNotEmpty() ? 'border' : 'border-t border-transparent' }}">
                @foreach ($days as $day)
                    <td>
                        <a
                            href="{{ $day->path() }}"
                            class="
                                block
                                py-0.5
                                hover:bg-gray-300
                                {{ $day->isNotWithin($month) ? 'text-gray-300' : '' }}
                                {{ $day->is($selectedDate) ? 'font-bold bg-gray-200' : '' }}
                            "
                        >
                            {{ $day->label() }}
                        </a>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
