<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\Procedure;
use App\Repositories\Interfaces\ProcedureInt;

/**
 * Class ProcedureImpl
 *
 * The class specialize the common class method. For implement new feature
 * add the firm inside the procedure interface and implement here the method.
 */
class ProcedureImpl extends CommonImpl implements ProcedureInt
{
    /** @var Procedure $procedure */
    private $procedure;

    public function __construct (Procedure $procedure)
    {
        parent::__construct($procedure);

        $this->procedure = $procedure;
    }
}
