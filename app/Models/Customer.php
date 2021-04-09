<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'customerNumber';

    protected $fillable = [
        "customerNumber",
        "customerName",
        "contactLastName",
        "contactFirstName",
        "phone",
        "addressLine1",
        "addressLine2",
        "city",
        "state",
        "postalCode",
        "country",
        "salesRepEmployeeNumber",
        "creditLimit",
        "customerNumber"];

    protected $appends= ['responsibleEmployee'];

    public function employee(){
        return $this->hasOne(Employee::class, 'employeeNumber', 'salesRepEmployeeNumber');
    }

    /**
     * Add responsible employee name according item 2 in test
     * @return string
     */
    public function getResponsibleemployeeAttribute(){
        if($this->employee) {
            $completeName = [
                $this->employee->firstName ?? '',
            $lastName = $this->employee->lastName ?? ''];
            return implode(' ', $completeName);
        }
        return '';
    }
}
