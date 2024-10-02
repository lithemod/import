<?php

namespace Tests;

use Lithe\Support\import;
use PHPUnit\Framework\TestCase;

class ImportTest extends TestCase
{
    protected function setUp(): void
    {
        // Criação dos diretórios e arquivos necessários
        if (!is_dir('path/to/directory')) {
            mkdir('path/to/directory', 0777, true);
        }
        file_put_contents('path/to/directory/testfile.php', '<?php echo $var1;');
        file_put_contents('path/to/directory/testfile1.php', '<?php echo "Included file 1";');
        file_put_contents('path/to/directory/testfile2.php', '<?php echo "Included file 2";');
    }

    public function testDirectoryInclusion()
    {
        ob_start(); // Inicie o buffer de saída
        $importer = import::dir('path/to/directory')->exceptions(['exclude.php']);
        $importer->get();
        $output = ob_get_clean(); // Capture a saída

        // Verifique se os arquivos foram incluídos corretamente
        $this->assertStringContainsString('Included file 1', $output);
        $this->assertStringContainsString('Included file 2', $output);
    }
}
