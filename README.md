# matrix-word-find
exercise in extracting words from a matrix of characters - 4 chars or more, no diagonals

## Purpose ##
Will find all 4 letter or longer words.

## Setup & Run ##

After checkout load composer requirements (there are not many). Then run the primary cli script.
```
composer install
php word-find-cli.php
```
## Notes ##
* The words can go in any direction: up, down, left, or right (not diagonal)
* It should handle arbitrarily sized puzzle inputs. The above is 15x15 but the solution
should work just as well with any other size
* The solution can just print out the list of found words, it does not need to print out their
position or direction
* You can use any language you like although we would like to be able to run your
submission, so please include instructions on compiling/running if you think it’s
necessary
* Hint: You may want to use the dictionary that is included on your system
  *  For OS X: /usr/share/dict/words

## Bonus ##
* Only return the longest valid word in a sequence of letters:
  * Don't return "broke" and "broker": only "broker"
  * Don’t return “hard” and “wood”; only “hardwood”
  
## Criteria for Success ##
* Correctness Does the program work as requested against both the provided input
above and additional word find inputs?
* Readability Is the code easy to understand? -- do we feel it would be easy to safely
modify the code in the future if needed
* Testability You do not need to write unit tests for this assignment, but we are interested
in seeing code that would be easy to write tests for
* Performance This is less important than the other criteria, but a faster program would
be a bonus