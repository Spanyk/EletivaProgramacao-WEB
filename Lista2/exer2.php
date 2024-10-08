<?php 

// A partir dessa classe, desenvolva as seguintes classes:  
// • Servente: classe derivada da classe Funcionario. Um servente recebe um adicional de 5% a título de 
// insalubridade  
// • Motorista: classe derivada da classe Funcionario. Para cada motorista é necessário armazenar o 
// número da carteira de motorista  
// • MestreDeObras: classe derivada da classe Servente. Para cada mestre de obras é necessário 
// armazenar quantos funcionarios estão sob sua supervisão. Um mestre de obras ganha um adicional 
// de 10% para cada grupo de 10 funcionários que estão sob seu comando.  d
// • Em todas as classes devem ser acrescentados os métodos get/set necessários.
 require_once '..\config.php';

use Config\Config;

Config::get_header();

abstract class Funcionario {
    protected string $nome = "";
    protected string $codigo = "";
    protected float $salarioBase = 0.0;
    
    public function __construct(string $codigo, string $nome, float $salarioBase) {
        $this->codigo = $codigo; 
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
    }

    public function getNome(): string { 
        return $this->nome; 
    }

    public function getCodigo(): string { 
        return $this->codigo; 
    }

    public function getSalarioBase(): float { 
        return $this->salarioBase; 
    }

    public function getSalarioLiquido(): float {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;

        if($this->salarioBase > 2000.0) {  
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }
        return ($this->salarioBase - $inss - $ir);
    }


    public function __toString(): string {
            return sprintf(
                "%s\nCodigo: %d\nNome: %s\nSalario Base: %.2f\nSalario liquido: %.2f",
                get_class($this),
                $this->getCodigo(),
                $this->getNome(),
                $this->getSalarioBase(),
                $this->getSalarioLiquido()
            );
    }
   
}

class Servente extends Funcionario  {

    
    public function getSalarioLiquido(): float {
        $Insalubridade = $this->salarioBase * 1.05;
        $inss = $Insalubridade * 0.1;
        $ir = 0.0;

        if($this->salarioBase > 2000.0) {  
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }
        return ($this->salarioBase - $inss - $ir);
    
    }
}

class Motorista extends Funcionario {
    private string $numeroCarteira = ""; 

    public function __construct(string $codigo, string $nome, float $salarioBase, string $numeroCarteira) {
        parent::__construct($codigo,$nome, $salarioBase);
        $this->numeroCarteira = $numeroCarteira;
    }
    public function setNumeroCarteira(string $numeroCarteira)  {
        $this->numeroCarteira = $numeroCarteira;
    }
    public function getNumeroCarteira() : string {
        return $this->numeroCarteira;
    } 


    public function __toString(): string {
        return parent::__toString() . "\nNúmero da Carteira: " . $this->numeroCarteira;
    }
}

class MestreDeObras extends Servente {
    private int $funcionario_sob_supervisao = 0;

    public function __construct(int $codigo, string $nome, float $salarioBase, int $funcionario_sob_supervisao) {
        parent::__construct($codigo, $nome, $salarioBase);
        $this->funcionario_sob_supervisao= $funcionario_sob_supervisao;
    }
   
    public function setFuncionarioSobSupervisao(int $funcionario_sob_supervisao) {
        $this->funcionario_sob_supervisao = $funcionario_sob_supervisao;
    }

    public function getFuncionarioSobSupervisao() : int {
        return $this->funcionario_sob_supervisao;
    }

    public function getSalarioLiquido(): float {
        $salarioBase = parent::getSalarioLiquido();
        $numeroDeGrupos = floor($this->funcionario_sob_supervisao / 10);
        $adicional = $numeroDeGrupos * 0.1 * $salarioBase;

        return $salarioBase + $adicional;
    }

    public function __toString(): string {
        return parent::__toString() . "\nFuncionários sob supervisão: " . $this->funcionario_sob_supervisao;
    }
}

$servente = new Servente("S01", "José da Silva", 2500.00);
echo "<br>Servente: " . $servente->getNome() . " | COD: " . $servente->getCodigo() . " - Salário: R$ " . number_format($servente->getSalarioLiquido(), 2, ',', '.') . "\n";

$motorista = new Motorista("M01", "Ana Oliveira", 3000.00, "1234567890");
echo "<br>Motorista: " . $motorista->getNome() . " | COD: " . $motorista->getCodigo() . " - Salário: R$ " . number_format($motorista->getSalarioLiquido(), 2, ',', '.') . "\n";
echo "<br>Número da Carteira: " . $motorista->getNumeroCarteira() . "\n";

// Testes
$salarioBase = 2050;

$casos = [5, 10, 15, 50 ];

foreach ($casos as $funcionarios) {
    $mestre = new MestreDeObras("1", "Paulo", $salarioBase, $funcionarios);
    $salario = $mestre->getSalarioLiquido();

    echo "<br>Mestre de obras: " .$mestre->getNome() ." | COD: ". $mestre->getCodigo() ." com $funcionarios funcionários - Salário: R$ " . number_format($salario, 2, ',', '.') . "\n";
}


?>


<div class="mt-3">
  <a href="../main.php" class="btn btn-secondary">
    <i class="fa-solid fa-house me-2"></i>Voltar
  </a>
</div>
<?php 
Config::get_footer();
?>