# Scalar objects for PHP

Example implementations for https://github.com/nikic/scalar_objects

## Examples

### string_join (implode)

    $string = ['a', 'b', 'c', 'd', 'e']->join(',');
    # $string is 'a,b,c,d,e'

### string_join without argument (implode)

    $string = ['a', 'b', 'c', 'd', 'e']->join();
    # $string is 'abcde'

### string_split (explode)

    $array = 'a,b,c,d,e'->split(',');
    # $array is ['a', 'b', 'c', 'd', 'e']

### string_contains (strpos)

    if(!'text@example.com'->contains('@')) {
        var_dump('Invalid email address';
    }

### Suffix

    $fileName = 'example'->addSuffix('.zip');

### array_map

    $result = ['a', 'b', 'c']->map(function($value, $key) {
        return $value->concat($key);
    });

## Tests

    docker run -it --rm foobox/scalar-objects
