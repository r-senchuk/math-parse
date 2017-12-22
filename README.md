# math-parse

Create parser of the expressions which can be defined by the BNF:
<expr> ::= <term> | <term> <add> <term>
<term> ::= <factor> | <factor> <mult> <factor> | <factor> <mult> <term>
<factor> ::= <neg> | - <neg>
<neg> ::= <number> | ( <expr> )
<add> ::= + | -
<mult> ::= * | /
<number> ::= <digit> | <number> <digit>
<digit> ::= 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9
Example: 200+12*((1/8)+1)-19
Script should be able to parse specified expressions and evaluate them. 
