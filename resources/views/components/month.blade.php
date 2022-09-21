@props(['weeks', 'date' => null])

<table class="m-auto text-xs text-center month">
    <thead>
        <tr>
            @foreach (['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'] as $day)
                <th>
                    <a href="" class="block py-0.5 hover:bg-gray-300">
                        {{ $day }}
                    </a>
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
                            href="{{ $date['path'] }}"
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
