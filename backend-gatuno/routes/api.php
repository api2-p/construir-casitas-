use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/casitas', function (Request $request) {
    $cadena = $request->input('cadenaJuguetes');

    function esValido($s) {
        if (strlen($s) > 1 && $s[0] === '0') return false;
        $n = intval($s);
        return $n >= 0 && $n <= 255;
    }

    function construir($s, $partes = [], $resultado = []) {
        if (count($partes) === 4) {
            if ($s === '') $resultado[] = join('.', $partes);
            return $resultado;
        }

        for ($i = 1; $i <= 3 && $i <= strlen($s); $i++) {
            $parte = substr($s, 0, $i);
            if (esValido($parte)) {
                $resultado = construir(substr($s, $i), array_merge($partes, [$parte]), $resultado);
            }
        }

        return $resultado;
    }

    return construir($cadena);
});


