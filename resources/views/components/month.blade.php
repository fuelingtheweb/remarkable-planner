@props(['weeks'])

<table class="m-auto text-xs text-center month">
    <thead>
        <tr>
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($weeks as $week)
            <tr class="{{ $week['selected'] ? 'border' : '' }}">
                @foreach ($week['days'] as $date)
                    <td>
                        <a
                            href="{{ $date['path'] }}"
                            class="
                                block
                                py-0.5
                                hover:bg-gray-300
                                {{ ! $date['withinMonth'] ? 'text-gray-300' : '' }}
                                {{ $date['selected'] ? 'font-bold bg-gray-200' : '' }}
                            "
                        >
                            {{ $date['day'] }}
                        </a>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
