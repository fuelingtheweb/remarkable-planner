@props(['weeks'])

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
