@props([
      'type' => 'wave',
      'color' => '#ffffff'
])

@if ($type === 'wave')
<svg class="absolute bottom-0 left-0 w-full h-24 text-gray-100"
        viewBox="0 0 1440 320" preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg">
        <path fill="{{ $color }}" 
            d="M0,160L48,176C96,192,192,224,288,234.7C384,245,480,235,576,208C672,181,768,139,864,122.7C960,107,1056,117,1152,144C1248,171,1344,213,1392,234.7L1440,256L1440,320L0,320Z">
        </path>
</svg>

@elseif ($type === 'cloud')
<!-- ONLY FOR WHITE SHADE -->
<svg class="absolute bottom-0 left-0 w-full h-40"
       viewBox="0 0 1440 320" preserveAspectRatio="none"
       xmlns="http://www.w3.org/2000/svg">
    <!-- Back wave = same as top section (#e5e7eb = Tailwind gray-200) -->
    <path fill="#e5e7eb"
          d="M0,192L48,176C96,160,192,128,288,133.3C384,139,480,181,576,186.7C672,192,768,160,864,165.3C960,171,1056,213,1152,229.3C1248,245,1344,235,1392,229.3L1440,224L1440,320L0,320Z"></path>
    <!-- Middle wave = lighter gray (#f3f4f6 = Tailwind gray-100) -->
    <path fill="#f3f4f6"
          d="M0,224L48,208C96,192,192,160,288,165.3C384,171,480,213,576,213.3C672,213,768,171,864,165.3C960,160,1056,192,1152,202.7C1248,213,1344,203,1392,197.3L1440,192L1440,320L0,320Z"></path>
    <!-- Front wave = same as bottom section (#ffffff = white) -->
    <path fill="{{ $color }}"
          d="M0,256L48,250.7C96,245,192,235,288,229.3C384,224,480,224,576,229.3C672,235,768,245,864,250.7C960,256,1056,256,1152,250.7C1248,245,1344,235,1392,229.3L1440,224L1440,320L0,320Z"></path>
  </svg>

@elseif ($type === 'oval')
<svg class="absolute bottom-0 left-0 w-full h-32"
       viewBox="0 0 1440 320" preserveAspectRatio="none"
       xmlns="http://www.w3.org/2000/svg">
    <path fill="{{ $color }}" 
          d="M0,0 Q720,320 1440,0 L1440,320 L0,320Z"></path>
</svg>
@endif