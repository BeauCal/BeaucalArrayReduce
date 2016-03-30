<?php

namespace BeaucalArrayReduce;

function allMatch(array $items, $predicate) {
    return array_reduce($items,
    function($carry, $item) use ($predicate) {
        return ($carry && $predicate($item));
    }, true);
}

/**
 * Does the predicate accept (at least) one item?
 * N.b. on empty input: FALSE
 *
 * @param array $items
 * @param function $predicate
 *
 * @return bool
 */
function hasMatch(array $items, $predicate) {
    return (bool) countMatch($items, $predicate);
}

/**
 * Count items matching predicate.
 *
 * @param array $items
 * @param function $predicate
 *
 * @return int
 */
function countMatch(array $items, $predicate) {
    return array_reduce($items,
    function($carry, $item) use ($predicate) {
        return $carry + ($predicate($item) ? 1 : 0);
    }, 0);
}

/**
 * Returns first item matching or NULL.
 *
 * @param array $items
 * @param function $predicate   If not supplied, becomes (bool) cast
 *
 * @return mixed
 */
function firstMatch(array $items, $predicate = null) {
    if ($predicate === null) {
        $predicate = function($item) {
            return (bool) $item;
        };
    }
    return array_reduce($items,
    function($carry, $item) use ($predicate) {
        if ($carry !== null || !$predicate($item)) {
            return $carry;
        }
        return $item;
    });
}

/**
 * Returns last item matching or NULL.
 *
 * @param array $items
 * @param function $predicate   If not supplied, becomes (bool) cast
 *
 * @return mixed
 */
function lastMatch(array $items, $predicate = null) {
    if ($predicate === null) {
        $predicate = function($item) {
            return (bool) $item;
        };
    }
    return array_reduce($items,
    function($carry, $item) use ($predicate) {
        return $predicate($item) ? $item : $carry;
    });
}
