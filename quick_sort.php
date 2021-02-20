<?
/**
 *  Быстрая сортировка (разделяй и властвуй)
 *  - выбираем последней элемент массив, он будет опорным
 *  - алгоритм просматривает все элементы кроме опорного и размещает все элементы которые меньше него, 
 *  левее от стены, а те которые больше него, справа от стены.
 *  - после прохода по всем элементам, мы устанавливаем опорный элемент справа от стены, по середине, между элементами меньшими и большими чем он.
 *  
 *  
 *  Время выполнения O(nlogn) в самом худшем случае будет O(n^2)
 *  https://www.youtube.com/watch?v=4s-aG6yGGLU
 */

function quick_sort(&$array, $left, $right) {

    //Создаем копии пришедших переменных, с которыми будем манипулировать в дальнейшем.
    $l = $left;
    $r = $right;
    
    //Вычисляем 'центр', на который будем опираться. Берем значение ~центральной ячейки массива.
    $center = $array[(int)($left + $right) / 2];
    
    //Цикл, начинающий саму сортировку
    do {
    
      //Ищем значения больше 'центра'
      while ($array[$r] > $center) { 
        $r--;
      }
      
      //Ищем значения меньше 'центра'
      while ($array[$l] < $center) { 
        $l++;
      }
    
      //После прохода циклов проверяем счетчики циклов
      if ($l <= $r) {
      
        //И если условие true, то меняем ячейки друг с другом.
         if ($array[$l] > $array[$r])   list($array[$r], $array[$l]) = array($array[$l], $array[$r]);
        
        //И переводим счетчики на следующий элементы
        $l++;
        $r--;
      }
    
    //Повторяем цикл, если true
    } while ($l <= $r);
    
    if ($r > $left) {
      //Если условие true, совершаем рекурсию
      //Передаем массив, исходное начало и текущий конец
      quick_sort($array, $left, $r); 
    }
    
    if ($l < $right) {
      //Если условие true, совершаем рекурсию
      //Передаем массив, текущие начало и конец
      quick_sort($array, $l, $right);
    }

}
$ar = [3,7,1,6,9,2];
$ar = quick_sort($ar, 3, 3);
echo '<pre>';print_r($ar);echo '</pre>';