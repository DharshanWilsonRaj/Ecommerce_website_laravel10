

    <button class="btn {{ $class }}"
        style="background:{{ $bgcolor }}; color:{{ $color }}; transition: background 0.3s, color 0.3s;"
        onmouseover="this.style.background='{{ $hoverBgcolor }}'; this.style.color='{{ $hoverColor }}';"
        onmouseout="this.style.background='{{ $bgcolor }}'; this.style.color='{{ $color }}';">
        {{ $slot }}
    </button>

