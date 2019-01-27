<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\Procedure as ProcedureModel;
use App\Repositories\Interfaces\Procedure as ProcedureInt;

/**
 * Class Procedure
 *
 * The class specialize the common class method. For implement new feature
 * add the firm inside the procedure interface and implement here the method.
 */
class Procedure extends Common implements ProcedureInt
{
    /** @var ProcedureModel $procedure */
    private $procedure;

    public function __construct (ProcedureModel $procedure)
    {
        parent::__construct($procedure);

        $this->procedure = $procedure;
    }
}
