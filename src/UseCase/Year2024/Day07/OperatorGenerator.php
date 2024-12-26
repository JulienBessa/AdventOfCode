<?php

namespace App\UseCase\Year2024\Day07;

use App\Enum\Year2024\Day07\Operator;

class OperatorGenerator
{
    /**
     * @return array<int,array<int,array<int,Operator>>>|array<string,array<int,array<int,array<int,Operator>>>>
     */
    public static function generateAllByNb(int $nbOperatorsMax): array
    {
        $allOperators = [];

        for ($i=1; $i < $nbOperatorsMax; $i++) { 
            $allOperators[$i] = self::generateAll($i);
            $allOperators["alter"][$i] = self::generateCharactersConcat($i, $allOperators[$i]);
        }

        return $allOperators;
    }

    /**
     * @return array<int,array<int,Operator>>
     */
    public static function generateAll(int $nbOperators): array
    {
        $allOperators = [];
        $allAsterisk = [];
        $allPlus = [];

        for ($i=0; $i < $nbOperators; $i++) { 
            $allAsterisk[] = Operator::ASTERISK;
            $allPlus[] = Operator::PLUS;
        }

        $allOperators[] = $allPlus;

        $allOperators = array_merge($allOperators, self::generateCharacters($nbOperators));

        $allOperators[] = $allAsterisk;

        return $allOperators;
    }

    /**
     * @return array<int,Operator>
     */
    public static function generateFullSameOperator(int $nbOperators, Operator $operator): array
    {
        $allSameOperators = [];

        for ($i=0; $i < $nbOperators; $i++) { 
            $allSameOperators[] = $operator;
        }

        return $allSameOperators;
    }

    /**
     * @return array<int,array<int,Operator>>
     */
    private static function generateCharacters(int $nbOperators): array
    {
        $allOperators = [];

        for ($i=0; $i < $nbOperators - 1; $i++) {
            $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
            $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);

            $operatorsAsterisk[$i] = Operator::PLUS;
            $operatorsPlus[$i] = Operator::ASTERISK;

            $allOperators[] = $operatorsAsterisk;
            $allOperators[] = $operatorsPlus;

            for ($j=$i + 1; $j < $nbOperators - 1; $j++) { 
                $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
    
                $operatorsAsterisk[$i] = Operator::PLUS;
                $operatorsAsterisk[$j] = Operator::PLUS;
                $operatorsPlus[$i] = Operator::ASTERISK;
                $operatorsPlus[$j] = Operator::ASTERISK;
    
                $allOperators[] = $operatorsAsterisk;
                $allOperators[] = $operatorsPlus;

                for ($k=$j + 1; $k < $nbOperators - 1; $k++) { 
                    $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                    $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
        
                    $operatorsAsterisk[$i] = Operator::PLUS;
                    $operatorsAsterisk[$j] = Operator::PLUS;
                    $operatorsAsterisk[$k] = Operator::PLUS;
                    $operatorsPlus[$i] = Operator::ASTERISK;
                    $operatorsPlus[$j] = Operator::ASTERISK;
                    $operatorsPlus[$k] = Operator::ASTERISK;
        
                    $allOperators[] = $operatorsAsterisk;
                    $allOperators[] = $operatorsPlus;

                    for ($l=$k + 1; $l < $nbOperators - 1; $l++) { 
                        $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                        $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
            
                        $operatorsAsterisk[$i] = Operator::PLUS;
                        $operatorsAsterisk[$j] = Operator::PLUS;
                        $operatorsAsterisk[$k] = Operator::PLUS;
                        $operatorsAsterisk[$l] = Operator::PLUS;
                        $operatorsPlus[$i] = Operator::ASTERISK;
                        $operatorsPlus[$j] = Operator::ASTERISK;
                        $operatorsPlus[$k] = Operator::ASTERISK;
                        $operatorsPlus[$l] = Operator::ASTERISK;
            
                        $allOperators[] = $operatorsAsterisk;
                        $allOperators[] = $operatorsPlus;

                        for ($m=$l + 1; $m < $nbOperators - 1; $m++) { 
                            $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                            $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
                
                            $operatorsAsterisk[$i] = Operator::PLUS;
                            $operatorsAsterisk[$j] = Operator::PLUS;
                            $operatorsAsterisk[$k] = Operator::PLUS;
                            $operatorsAsterisk[$l] = Operator::PLUS;
                            $operatorsAsterisk[$m] = Operator::PLUS;
                            $operatorsPlus[$i] = Operator::ASTERISK;
                            $operatorsPlus[$j] = Operator::ASTERISK;
                            $operatorsPlus[$k] = Operator::ASTERISK;
                            $operatorsPlus[$l] = Operator::ASTERISK;
                            $operatorsPlus[$m] = Operator::ASTERISK;
                
                            $allOperators[] = $operatorsAsterisk;
                            $allOperators[] = $operatorsPlus;

                            for ($n=$m + 1; $n < $nbOperators - 1; $n++) { 
                                $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                                $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
                    
                                $operatorsAsterisk[$i] = Operator::PLUS;
                                $operatorsAsterisk[$j] = Operator::PLUS;
                                $operatorsAsterisk[$k] = Operator::PLUS;
                                $operatorsAsterisk[$l] = Operator::PLUS;
                                $operatorsAsterisk[$m] = Operator::PLUS;
                                $operatorsAsterisk[$n] = Operator::PLUS;
                                $operatorsPlus[$i] = Operator::ASTERISK;
                                $operatorsPlus[$j] = Operator::ASTERISK;
                                $operatorsPlus[$k] = Operator::ASTERISK;
                                $operatorsPlus[$l] = Operator::ASTERISK;
                                $operatorsPlus[$m] = Operator::ASTERISK;
                                $operatorsPlus[$n] = Operator::ASTERISK;
                    
                                $allOperators[] = $operatorsAsterisk;
                                $allOperators[] = $operatorsPlus;

                                for ($o=$n + 1; $o < $nbOperators - 1; $o++) { 
                                    $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                                    $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
                        
                                    $operatorsAsterisk[$i] = Operator::PLUS;
                                    $operatorsAsterisk[$j] = Operator::PLUS;
                                    $operatorsAsterisk[$k] = Operator::PLUS;
                                    $operatorsAsterisk[$l] = Operator::PLUS;
                                    $operatorsAsterisk[$m] = Operator::PLUS;
                                    $operatorsAsterisk[$n] = Operator::PLUS;
                                    $operatorsAsterisk[$o] = Operator::PLUS;
                                    $operatorsPlus[$i] = Operator::ASTERISK;
                                    $operatorsPlus[$j] = Operator::ASTERISK;
                                    $operatorsPlus[$k] = Operator::ASTERISK;
                                    $operatorsPlus[$l] = Operator::ASTERISK;
                                    $operatorsPlus[$m] = Operator::ASTERISK;
                                    $operatorsPlus[$n] = Operator::ASTERISK;
                                    $operatorsPlus[$o] = Operator::ASTERISK;
                        
                                    $allOperators[] = $operatorsAsterisk;
                                    $allOperators[] = $operatorsPlus;

                                    for ($p=$o + 1; $p < $nbOperators - 1; $p++) { 
                                        $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                                        $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
                            
                                        $operatorsAsterisk[$i] = Operator::PLUS;
                                        $operatorsAsterisk[$j] = Operator::PLUS;
                                        $operatorsAsterisk[$k] = Operator::PLUS;
                                        $operatorsAsterisk[$l] = Operator::PLUS;
                                        $operatorsAsterisk[$m] = Operator::PLUS;
                                        $operatorsAsterisk[$n] = Operator::PLUS;
                                        $operatorsAsterisk[$o] = Operator::PLUS;
                                        $operatorsAsterisk[$p] = Operator::PLUS;
                                        $operatorsPlus[$i] = Operator::ASTERISK;
                                        $operatorsPlus[$j] = Operator::ASTERISK;
                                        $operatorsPlus[$k] = Operator::ASTERISK;
                                        $operatorsPlus[$l] = Operator::ASTERISK;
                                        $operatorsPlus[$m] = Operator::ASTERISK;
                                        $operatorsPlus[$n] = Operator::ASTERISK;
                                        $operatorsPlus[$o] = Operator::ASTERISK;
                                        $operatorsPlus[$p] = Operator::ASTERISK;
                            
                                        $allOperators[] = $operatorsAsterisk;
                                        $allOperators[] = $operatorsPlus;

                                        for ($q=$p + 1; $q < $nbOperators - 1; $q++) { 
                                            $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                                            $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
                                
                                            $operatorsAsterisk[$i] = Operator::PLUS;
                                            $operatorsAsterisk[$j] = Operator::PLUS;
                                            $operatorsAsterisk[$k] = Operator::PLUS;
                                            $operatorsAsterisk[$l] = Operator::PLUS;
                                            $operatorsAsterisk[$m] = Operator::PLUS;
                                            $operatorsAsterisk[$n] = Operator::PLUS;
                                            $operatorsAsterisk[$o] = Operator::PLUS;
                                            $operatorsAsterisk[$p] = Operator::PLUS;
                                            $operatorsAsterisk[$q] = Operator::PLUS;
                                            $operatorsPlus[$i] = Operator::ASTERISK;
                                            $operatorsPlus[$j] = Operator::ASTERISK;
                                            $operatorsPlus[$k] = Operator::ASTERISK;
                                            $operatorsPlus[$l] = Operator::ASTERISK;
                                            $operatorsPlus[$m] = Operator::ASTERISK;
                                            $operatorsPlus[$n] = Operator::ASTERISK;
                                            $operatorsPlus[$o] = Operator::ASTERISK;
                                            $operatorsPlus[$p] = Operator::ASTERISK;
                                            $operatorsPlus[$q] = Operator::ASTERISK;
                                
                                            $allOperators[] = $operatorsAsterisk;
                                            $allOperators[] = $operatorsPlus;

                                            for ($r=$q + 1; $r < $nbOperators - 1; $r++) { 
                                                $operatorsAsterisk = self::generateFullSameOperator($nbOperators, Operator::ASTERISK);
                                                $operatorsPlus = self::generateFullSameOperator($nbOperators, Operator::PLUS);
                                    
                                                $operatorsAsterisk[$i] = Operator::PLUS;
                                                $operatorsAsterisk[$j] = Operator::PLUS;
                                                $operatorsAsterisk[$k] = Operator::PLUS;
                                                $operatorsAsterisk[$l] = Operator::PLUS;
                                                $operatorsAsterisk[$m] = Operator::PLUS;
                                                $operatorsAsterisk[$n] = Operator::PLUS;
                                                $operatorsAsterisk[$o] = Operator::PLUS;
                                                $operatorsAsterisk[$p] = Operator::PLUS;
                                                $operatorsAsterisk[$q] = Operator::PLUS;
                                                $operatorsAsterisk[$r] = Operator::PLUS;
                                                $operatorsPlus[$i] = Operator::ASTERISK;
                                                $operatorsPlus[$j] = Operator::ASTERISK;
                                                $operatorsPlus[$k] = Operator::ASTERISK;
                                                $operatorsPlus[$l] = Operator::ASTERISK;
                                                $operatorsPlus[$m] = Operator::ASTERISK;
                                                $operatorsPlus[$n] = Operator::ASTERISK;
                                                $operatorsPlus[$o] = Operator::ASTERISK;
                                                $operatorsPlus[$p] = Operator::ASTERISK;
                                                $operatorsPlus[$q] = Operator::ASTERISK;
                                                $operatorsPlus[$r] = Operator::ASTERISK;
                                    
                                                $allOperators[] = $operatorsAsterisk;
                                                $allOperators[] = $operatorsPlus;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $allOperators;
    }

    /**
     * @param array<int,array<int,Operator>> $generatedCharacters
     * 
     * @return array<int,array<int,Operator>>
     */
    private static function generateCharactersConcat(int $nbOperators, array $generatedCharacters): array
    {
        $allOperators = [];
        $allConcat = [];

        for ($i=0; $i < $nbOperators; $i++) { 
            $allConcat[] = Operator::CONCAT;
        }

        $allOperators[] = $allConcat;

        foreach ($generatedCharacters as $generatedCharacter) {
            for ($i=0; $i < $nbOperators; $i++) {
                $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);

                $duplicated[$i] = Operator::CONCAT;

                $allOperators[] = $duplicated;

                for ($j=$i + 1; $j < $nbOperators; $j++) { 
                    $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
        
                    $duplicated[$i] = Operator::CONCAT;
                    $duplicated[$j] = Operator::CONCAT;
        
                    $allOperators[] = $duplicated;

                    for ($k=$j + 1; $k < $nbOperators; $k++) { 
                        $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
            
                        $duplicated[$i] = Operator::CONCAT;
                        $duplicated[$j] = Operator::CONCAT;
                        $duplicated[$k] = Operator::CONCAT;
            
                        $allOperators[] = $duplicated;

                        for ($l=$k + 1; $l < $nbOperators; $l++) { 
                            $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                
                            $duplicated[$i] = Operator::CONCAT;
                            $duplicated[$j] = Operator::CONCAT;
                            $duplicated[$k] = Operator::CONCAT;
                            $duplicated[$l] = Operator::CONCAT;
                
                            $allOperators[] = $duplicated;

                            for ($m=$l + 1; $m < $nbOperators; $m++) { 
                                $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                    
                                $duplicated[$i] = Operator::CONCAT;
                                $duplicated[$j] = Operator::CONCAT;
                                $duplicated[$k] = Operator::CONCAT;
                                $duplicated[$l] = Operator::CONCAT;
                                $duplicated[$m] = Operator::CONCAT;
                    
                                $allOperators[] = $duplicated;

                                for ($n=$m + 1; $n < $nbOperators; $n++) { 
                                    $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                        
                                    $duplicated[$i] = Operator::CONCAT;
                                    $duplicated[$j] = Operator::CONCAT;
                                    $duplicated[$k] = Operator::CONCAT;
                                    $duplicated[$l] = Operator::CONCAT;
                                    $duplicated[$m] = Operator::CONCAT;
                                    $duplicated[$n] = Operator::CONCAT;
                        
                                    $allOperators[] = $duplicated;

                                    for ($o=$n + 1; $o < $nbOperators; $o++) { 
                                        $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                            
                                        $duplicated[$i] = Operator::CONCAT;
                                        $duplicated[$j] = Operator::CONCAT;
                                        $duplicated[$k] = Operator::CONCAT;
                                        $duplicated[$l] = Operator::CONCAT;
                                        $duplicated[$m] = Operator::CONCAT;
                                        $duplicated[$n] = Operator::CONCAT;
                                        $duplicated[$o] = Operator::CONCAT;
                            
                                        $allOperators[] = $duplicated;

                                        for ($p=$o + 1; $p < $nbOperators; $p++) { 
                                            $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                                
                                            $duplicated[$i] = Operator::CONCAT;
                                            $duplicated[$j] = Operator::CONCAT;
                                            $duplicated[$k] = Operator::CONCAT;
                                            $duplicated[$l] = Operator::CONCAT;
                                            $duplicated[$m] = Operator::CONCAT;
                                            $duplicated[$n] = Operator::CONCAT;
                                            $duplicated[$o] = Operator::CONCAT;
                                            $duplicated[$p] = Operator::CONCAT;
                                
                                            $allOperators[] = $duplicated;

                                            for ($q=$p + 1; $q < $nbOperators; $q++) { 
                                                $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                                    
                                                $duplicated[$i] = Operator::CONCAT;
                                                $duplicated[$j] = Operator::CONCAT;
                                                $duplicated[$k] = Operator::CONCAT;
                                                $duplicated[$l] = Operator::CONCAT;
                                                $duplicated[$m] = Operator::CONCAT;
                                                $duplicated[$n] = Operator::CONCAT;
                                                $duplicated[$o] = Operator::CONCAT;
                                                $duplicated[$p] = Operator::CONCAT;
                                                $duplicated[$q] = Operator::CONCAT;
                                    
                                                $allOperators[] = $duplicated;

                                                for ($r=$q + 1; $r < $nbOperators; $r++) { 
                                                    $duplicated = ArrayDuplicator::duplicateIntOperatorArray($generatedCharacter);
                                        
                                                    $duplicated[$i] = Operator::CONCAT;
                                                    $duplicated[$j] = Operator::CONCAT;
                                                    $duplicated[$k] = Operator::CONCAT;
                                                    $duplicated[$l] = Operator::CONCAT;
                                                    $duplicated[$m] = Operator::CONCAT;
                                                    $duplicated[$n] = Operator::CONCAT;
                                                    $duplicated[$o] = Operator::CONCAT;
                                                    $duplicated[$p] = Operator::CONCAT;
                                                    $duplicated[$q] = Operator::CONCAT;
                                                    $duplicated[$r] = Operator::CONCAT;
                                        
                                                    $allOperators[] = $duplicated;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $allOperators;
    }
}
