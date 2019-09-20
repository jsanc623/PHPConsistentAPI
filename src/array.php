<?php

namespace PHPBenchTime;

use http\Exception;

class Arr {
    /**
     * The array we're working with
     * @var array
     */
    private $array;

    /**
     * Tracks our selected sort flag
     * @var
     */
    private $sortFlag;

    /**
     * The available sort flags
     * @var array
     */
    private $availableSortFlags = [
        SORT_REGULAR, // compare items normally (don't change types)
        SORT_NUMERIC, // compare items numerically
        SORT_STRING, // compare items as strings
        SORT_LOCALE_STRING, // compare items as strings, based on the current locale. It uses the locale, which can be changed using setlocale()
        SORT_NATURAL, // compare items as strings using "natural ordering" like natsort()
        SORT_FLAG_CASE // can be combined (bitwise OR) with SORT_STRING or SORT_NATURAL to sort strings case-insensitively
    ];

    /**
     * Arr constructor.
     * @param array $array
     */
    public function __construct(Array $array) {
        $this->array = $array;
        $this->sortFlag = $this->availableSortFlags[0];
    }

    /**
     * @return string
     */
    public function __toString() {
        return (string)print_r($this->array, true);
    }

    /**
     *
     */
    public function array_change_key_case() {
    }

    /**
     *
     */
    public function array_chunk() {

    }

    /**
     *
     */
    public function array_column() {

    }

    /**
     *
     */
    public function array_combine() {

    }

    /**
     *
     */
    public function array_count_values() {

    }

    /**
     *
     */
    public function array_diff_assoc() {

    }

    /**
     *
     */
    public function array_diff_key() {

    }

    /**
     *
     */
    public function array_diff_uassoc() {

    }

    /**
     *
     */
    public function array_diff_ukey() {

    }

    /**
     *
     */
    public function array_diff() {

    }

    /**
     *
     */
    public function array_fill_keys() {

    }

    /**
     *
     */
    public function array_fill() {

    }

    /**
     *
     */
    public function array_filter() {

    }

    /**
     *
     */
    public function array_flip() {

    }

    /**
     *
     */
    public function array_intersect_assoc() {

    }

    /**
     *
     */
    public function array_intersect_key() {

    }

    /**
     *
     */
    public function array_intersect_uassoc() {

    }

    /**
     *
     */
    public function array_intersect_ukey() {

    }

    /**
     *
     */
    public function array_intersect() {

    }

    /**
     *
     */
    public function array_key_exists() {

    }

    /**
     *
     */
    public function array_key_first() {

    }

    /**
     *
     */
    public function array_key_last() {

    }

    /**
     *
     */
    public function array_keys() {

    }

    /**
     *
     */
    public function array_map() {

    }

    /**
     *
     */
    public function array_merge_recursive() {

    }

    /**
     *
     */
    public function array_merge() {

    }

    /**
     *
     */
    public function array_pad() {

    }

    /**
     *
     */
    public function array_pop() {

    }

    /**
     *
     */
    public function array_product() {

    }

    /**
     *
     */
    public function array_push() {

    }

    /**
     *
     */
    public function array_rand() {

    }

    /**
     *
     */
    public function array_reduce() {

    }

    /**
     *
     */
    public function array_replace_recursive() {

    }

    /**
     *
     */
    public function array_replace() {

    }

    /**
     *
     */
    public function array_reverse() {

    }

    /**
     *
     */
    public function array_search() {

    }

    /**
     *
     */
    public function array_shift() {

    }

    /**
     *
     */
    public function array_slice() {

    }

    /**
     *
     */
    public function array_splice() {

    }

    /**
     *
     */
    public function array_sum() {

    }

    /**
     *
     */
    public function array_udiff_assoc() {

    }

    /**
     *
     */
    public function array_udiff_uassoc() {

    }

    /**
     *
     */
    public function array_udiff() {

    }

    /**
     *
     */
    public function array_uintersect_assoc() {

    }

    /**
     *
     */
    public function array_uintersect_uassoc() {

    }

    /**
     *
     */
    public function array_uintersect() {

    }

    /**
     *
     */
    public function array_unique() {

    }

    /**
     *
     */
    public function array_unshift() {

    }

    /**
     *
     */
    public function array_values() {

    }

    /**
     *
     */
    public function array_walk_recursive() {

    }

    /**
     *
     */
    public function array_walk() {

    }

    /**
     *
     */
    public function array() {

    }

    /**
     *
     */
    public function compact() {

    }

    /**
     *
     */
    public function count() {

    }

    /**
     *
     */
    public function current() {

    }

    /**
     *
     */
    public function end() {

    }

    /**
     *
     */
    public function extract() {

    }

    /**
     *
     */
    public function in_array() {

    }

    /**
     *
     */
    public function key_exists() {

    }

    /**
     *
     */
    public function key() {

    }

    /**
     *
     */
    public function list() {

    }

    /**
     *
     */
    public function next() {

    }

    /**
     *
     */
    public function pos() {

    }

    /**
     *
     */
    public function prev() {

    }

    /**
     *
     */
    public function range() {

    }

    /**
     *
     */
    public function reset() {

    }

    /**
     *
     */
    public function shuffle() {

    }

    /**
     *
     */
    public function sizeof() {

    }

    /**
     * Set the sort flag
     * @param int $sortFlag
     * @internal SORT_REGULAR|SORT_NUMERIC|SORT_STRING|SORT_LOCALE_STRING|SORT_NATURAL|SORT_FLAG_CASE
     * @return bool
     */
    public function setSortFlag($sortFlag=SORT_REGULAR) {
        if(in_array($sortFlag, $this->availableSortFlags)) {
            $this->sortFlag = $sortFlag;
            return TRUE;
        }
        return FALSE;
   }

    /**
     * Sort an array
     * @param bool $reverse
     * @internal array_multisort|arsort|asort|krsort|ksort|natcasesort|natsort|rsort|uasort|sort|uksort|usort
     */
    public function sort($reverse=False) {


// array_multisort — Sort multiple or multi-dimensional arrays
// array_multisort ( array &$array1 [, mixed $array1_sort_order = SORT_ASC [, mixed $array1_sort_flags = SORT_REGULAR [, mixed $... ]]] ) : bool

// arsort — Sort an array in reverse order and maintain index association
// arsort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

// asort — Sort an array and maintain index association
// asort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

// krsort — Sort an array by key in reverse order
// krsort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

// ksort — Sort an array by key
// ksort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

// natcasesort — Sort an array using a case insensitive "natural order" algorithm
// natcasesort ( array &$array ) : bool

// natsort — Sort an array using a "natural order" algorithm
// natsort ( array &$array ) : bool

// rsort — Sort an array in reverse order
// rsort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

// sort — Sort an array
// sort ( array &$array [, int $sort_flags = SORT_REGULAR ] ) : bool

// uasort — Sort an array with a user-defined comparison function and maintain index association
// uasort ( array &$array , callable $value_compare_func ) : bool

// uksort — Sort an array by keys using a user-defined comparison function
// uksort ( array &$array , callable $key_compare_func ) : bool

// usort — Sort an array by values using a user-defined comparison function
// usort ( array &$array , callable $value_compare_func ) : bool


    }
}