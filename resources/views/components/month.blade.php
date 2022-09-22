@props(['weeks', 'date' => null])

<table class="m-auto text-xs text-center month">
    <thead>
        <tr>
            @foreach ($weeks->first() as $index => $day)
                <th>
                    @if ($date)
                        @php
                            $targetDate = $date->startOfWeek(Carbon\Carbon::SUNDAY)->addDays($index);
                        @endphp
                        <a
                            href="#{{ $targetDate->toDateString() }}"
                            class="block py-0.5 hover:bg-gray-300 {{ $targetDate->is($date) ? 'font-bold bg-gray-200' : '' }}"
                        >
                            {{ str($day['date']->format('D'))->limit(2, '') }}
                        </a>
                    @else
                        <span class="block py-0.5">
                            {{ str($day['date']->format('D'))->limit(2, '') }}
                        </span>
                    @endif
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($weeks as $days)
            <tr class="{{ $date && $days->filter(fn ($day) => $day['date']->is($date))->isNotEmpty() ? 'border' : '' }}">
                @foreach ($days as $day)
                    <td>
                        <a
                            href="#{{ $day['date']->toDateString() }}"
                            class="
                                block
                                py-0.5
                                hover:bg-gray-300
                                {{ ! $day['withinMonth'] ? 'text-gray-300' : '' }}
                                {{ $date && $day['date']->is($date) ? 'font-bold bg-gray-200' : '' }}
                            "
                        >
                            {{ $day['day'] }}
                        </a>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
