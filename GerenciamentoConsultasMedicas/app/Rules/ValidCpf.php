<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCpf implements Rule
{
    public function passes($attribute, $value)
    {
        // Implemente a lógica de validação de CPF aqui
        return $this->validateCpf($value);
    }

    public function message()
    {
        return 'O :attribute informado não é um CPF válido.';
    }

    private function validateCpf($cpf)
    {
        // // Remover máscara do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se todos os dígitos são iguais ou se a quantidade de dígitos é diferente de 11
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Validação do CPF usando algoritmo
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
