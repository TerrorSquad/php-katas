<?php
declare(strict_types=1);

namespace App;

class OpenAPIValidator
{

    public function validate(string $json)
    {
        $contract = json_decode($json, true);
        $violations = [];

        $userViolations = $this->validateUser($contract);
        $cartViolations = $this->validateCart($contract);

        $violations = array_unique(
            array_merge(
                $violations,
                $userViolations,
                $cartViolations,
            )
        );

        return $violations;
    }

    private function validateUser($contract)
    {
        $violations = [];
        $key = 'userId';
        if (!isset($contract[$key])) {
            $violations[] = 'NO_USER_ID_FIELD';
        } else {
            if (gettype($contract[$key]) !== 'integer') {
                $violations[] = 'INVALID_USER_ID_TYPE';
            }
            if (strlen(''.$contract[$key]) !== 9) {
                $violations[] = 'INVALID_USER_ID_LENGTH';
            }
        }

        return $violations;
    }

    private function validateCart($contract)
    {
        $violations = [];
        $key = 'cart';
        if (!isset($contract[$key])) {
            $violations[] = 'NO_CART_FIELD';
        } else {
            if (gettype($contract[$key]) !== 'array') {
                $violations[] = 'INVALID_CART_TYPE';
            } else {
                if (count($contract[$key]) === 0) {
                    $violations[] = 'EMPTY_CART';
                } else {
                    $cart = $contract[$key];
                    foreach ($cart as $product) {
                        $productViolation = $this->validateProduct($product);
                        if (!empty($productViolation)) {
                            $violations[] = $productViolation;
                        }
                    }
                }
            }
        }
        return $violations;
    }

    private function validateProduct($product)
    {
        $violations = [];
        $key = 'productId';
        if (!isset($product[$key])) {
            $violations[] = 'NO_PRODUCT_ID_FIELD';
        } else {
            if (gettype($product[$key]) !== 'string') {
                $violations[] = 'INVALID_PRODUCT_ID_TYPE';
            }
            if (strlen($product[$key]) !== 9) {
                $violations[] = 'INVALID_PRODUCT_ID_LENGTH';
            }
        }
        return $violations;
    }
}
