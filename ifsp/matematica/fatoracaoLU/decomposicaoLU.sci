// Função para o método de Fatoração LU na resolução de sistemas lineares.

// Nossa função será chamada de FatoracaoLU, e os inputs serão justamente
// as matrizes A e B do sistema linear AX = B.

function FatoracaoLU(A,B)

// Criamos uma variável 'Ae' que irá assumir o valor da matriz A.

Ae = A;

// Calculamos a dimensão (2.2.1) das matrizes iniciais usando a função size 
// e armazenamos esse valor em diferentes variáveis. As variáveis m e c 
// armazenarão quantas linhas a matriz A e a matriz B tem, respectivamente. 
// Enquanto n e d armazenam o número de colunas.

[m,n] = size(A);
[c,d] = size(B);

// Criamos uma condição para que A seja quadrada (2.2.6), ou seja, m precisa 
// ser igual a n, caso contrário o código se encerra.

if m~=n
    printf('\nA matriz A não é quadrada, logo não pode ser fatorada.\n\n');
    return
end

// Calculamos a característica de A (2.2.11) usando a função rank e salvamos
// esse valor na variável CA. O determinante de A (2.2.5) também é calculado
// usando a função det.

CA = rank(A);
detA = det(A);

// Para criarmos a matriz ampliada [A,B] (2.2.9) precisamos de duas condições.
// A matriz B precisa ser uma matriz coluna (só ter uma coluna) e o número de
// linhas de A deve ser igual ao de B. 

if d~=1
    printf('\nA matriz B deve ser uma matriz coluna.\n\n');
    return
end

if m~=c
    printf('\nO número de linhas de A é diferente do número de linhas de B.\n\n');
    return
end

// Estabelecida as duas condições podemos criar [A,B] e salvar seu valor na
// varíavel Ab. Aqui a característica de Ab também é calculada.

Ab = [A,B];
CAb = rank(Ab);

// Como visto em (2.3), pelo Teorema Rouché-Capelli se p(Ab)>p(A) o sistema é
// impossível (SI). E se det(A)=0 (o que implica em um número maior de equações
// do que incógnitas) e p(Ab)=p(A), então o sistema é possível e indeterminado (SPI).

if CAb>CA
    printf('\nNão há soluções\n\n');
    return
end

if (detA==0)&&(CAb==CA)
    printf('\nHá infinitas soluções\n\n');
    return
end

// Se o algoritmo chegou até aqui então quer dizer que A tem os requisitos para 
// poder ser fatorada. Vamos começar definindo os valores inicias para alpha (II)
// e I que será usado para o cálculo do determinante de U caso a matriz A precise 
// ser permutada (8ª propriedade dos determinantes). Nesse caso o valor inicial 
// será zero para as duas variáveis.

alpha = 0;
I = 0;

// Definimos também o valor inicial para a matriz L e para a matriz de permutação
// P. A função eye(n,n) cria uma matriz identidade (2.2.7) de ordem n e armazena
// essa matriz em uma determinada variável, no caso em L e P.

L = eye(n,n);
P = eye(n,n);


// Criamos um loop que irá percorrer todas as colunas da matriz ampliada Ab da 
// esquerda para a direita.

for j = 1:n
    
    // As operações elementares (2.4) podem ser expressas na forma de matrizes,
    // estas são chamadas de matrizes elementares. Vamos definir uma matriz
    // elementar que irá armazenar quais linhas de A foram permutadas (caso seja
    // necessário) em cada loop, sendo que de um loop para o outro a matriz é
    // resetada ao seu valor inicial, que é a matriz identidade (eye).
    
    E = eye(n,n);

      // Vamos verificar se o pivô da j-ésima linha precisa ter sua linha permu-
      // tada, para isso seu valor precisa ser zero.
      
      if Ae(j,j) == 0

         // Como a linha precisa ser permutada, vamos comparar os elementos da 
         // j-ésima coluna e verificar qual é o de maior valor usando a função
         // max. Essa função salva o valor máximo na primeira variável (v) e o
         // número da sua linha na segunda (p). Quando usamos o comando Ae(:,j) 
         // estaremos interessado em todas linhas, simbolizadas por :, que cruzam 
         // a linha j, na matriz Ae. Em outras palavras estamos avaliando a 
         // j-ésima coluna de Ae.
         
         colj = Ae(:,j);
         [v,p] = max(colj);
         
         // Salvamos o valor da j-ésima linha de E na variável memoria.
         
         memoria = E(j,:);
         
         // Permutamos as linhas de acordo com o valor definido para p.
         
         E(j,:) = E(p,:);
         E(p,:) = memoria;  
         
         // Como dito antes, as operações elementares podem ser represetadas por
         // matrizes, no nosso caso a matriz elementar é E. Quando encontrada
         // podemos usa-la para modificar certa matriz usando um produto de
         // matrizes(2.2.4). Como queremos permutar as linhas de Ae, multiplicamos ela
         // pela matriz elementar E.
         
         Ae = E*Ae;
         
         // Para salvarmos as alterações já feitas precisamos multiplicar P por E,
         // já que ao final do loop a matriz elementar será resetada.
         
         P = E*P;
         
         // Como as linhas foram permutadas atualizamos o valor de I em uma unidade. 
         
         I = I + 1;
         
      end
      
            // Verificada a j-ésima coluna para que não corramos o risco de que o
            // pivô seja nulo, podemos agora escalona-la (2.4).
            
            for i = j:(m-1)

                alpha = Ae(i+1,j)/Ae(j,j);
                Ae(i+1,:) = Ae(i+1,:) - alpha*Ae(j,:);
                
            end     
 
end

// Definimos o termo final que será multiplicado pelo determinante de U.

Id = (-1)^I;

// Sendo U o que restou do escalonamento, igualamos U à matriz escalonada Ae.

U = Ae;

// Resetamos o valor de Ae para P*A. Dessa forma poderemos encontrar os valores
// alpha que constituem a matriz L. Note que não podíamos ter usado os valores 
// de alpha encontrados no primeiro escalonamento pois a matriz Ae ainda estava
// sendo permutada, com isso a matriz L também seria permutada a cada loop, o
// que obviamente alteraria toda a sua estrutura, gerando valores incompatíveis.
// Ainda vale ressaltar que se a matriz Ae não precisasse ser permutada, o valor
// de P seria o seu valor inicial, P = I, o que não alteraria o valor de Ae, que 
// inicialmente é igual a A.

Ae = P*A;

// Definindo L' para a matriz já permutada (L'=PL), por praticidade ainda repre-
// sentaremos L' por L.

for j = 1:n
    
            for i = j:(m-1)

                alpha = Ae(i+1,j)/Ae(j,j);
                Ae(i+1,:) = Ae(i+1,:) - alpha*Ae(j,:);
                L(i+1,j) = alpha;
                
            end
end

// Para manter a igualdade dos termos em AX = B precisamos multiplicar P nos dois
// lados da equação, PAX = PB --- (PL)(UX) = PB --- L'Y = PB. Portanto, Y será 
// calculado usando substituição progressiva (III) para L' e PB.

Bd = P*B;

// O valor inicial de Y e X será definido como um vetor coluna de n linhas compos-
// to apenas de zeros. Para fazer isso usamos a função zeros.
 
Y = zeros(n,1);

// O primeiro termo de Y será sempre igual ao primeiro termo de Bd.

Y(1,1) = Bd(1,1);

// Calculando Y usando substituição progressiva.

for i = 2:n
    Y(i,1) = Bd(i,1);
        for j = i:-1:2
            N(j) = Y(j-1,1)*L(i,j-1);
            Y(i,1) = Y(i,1) - N(j);
        end
end

X = zeros(n,1);

// O último termo de X será o n-ésimo termo de Y sobre o elemento de posição
// nn da matriz U.

X(n,1) = Y(n,1)/U(n,n);

// Calculando X usando substituição regressiva (IV).

for i = (n-1):-1:1
    X(i,1) = Y(i,1)/U(i,i);
    for j = n:-1:(i+1)
        N(j) = X(j,1)*U(i,j);
        X(i,1) = X(i,1) - N(j)/U(i,i);
    end
end

// A função disp mostra na tela o valor do vetor X. 

disp(X,'X = ');

// Encerra a função.

endfunction
