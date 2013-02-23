var h = document.getElementsByTagName('head')[0];
document.title = "Test Online LaTeX Equation Editor - create, integrate and download";
var l = document.createElement("link");
l.setAttribute("rel", "stylesheet");
l.setAttribute("type", "text/css");
l.setAttribute("href", "http://latex.codecogs.com/css/equation-5.css");
(h || document.body).appendChild(l);
var EQUATION_ENGINE = 'http://latex.codecogs.com';
var FAVORITE_ENGINE = 'http://latex.codecogs.com/json';
var EDITOR_SRC = 'http://latex.codecogs.com';
var EMBED_ENGINE = 'http://latex.codecogs.com/editor_embedded_json.php';
var EDIT_ENGINE = 'http://www.codecogs.com/eqnedit.php';
eval(function (p, a, c, k, e, d) {
    e = function (c) {
        return (c35 ? String.fromCharCode(c + 29) : c.toString(36));
    };
    if (!''.replace(/^/, String)) {
        while (c--) {
            d[e(c)] = k[c] || e(c);
        }
        k = [function (e) {
            return d[e]
        }];
        e = function () {
            return '\\w+'
        };
        c = 1;
    };
    while (c--) {
        if (k[c]) {
            p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
        }
    }
    return p;
}('k $(n){u E.2n(n);}k $2E(n,1w){j a=$(n);h(a)a.2E=1w;}k $1E(n,1w){j a=$(n);h(a)a.1E=1w;}k 84(){j e=$(\'69\');j x=e.7W;h($(\'6h\').M.6i==\'6g\')x-=7Y;$(\'7V\').M.1Y=(x<3y?\'3w\':\'3p\');$(\'6h\').M.6i=(x<3y?\'6g\':\'8i\');}j 6f=L;j 1d={1l:k(3q,q,4L){h(6f)u;{j 3R=O 4n();3R.7X(3R.8S()+4L);E.2Q=3q+"="+41(q)+((4L==A)?"":";8J="+3R.8F());}},2a:k(3q){h(E.2Q.C>0){2S=E.2Q.17(3q+"=");h(2S!=-1){2S=2S+3q.C+1;3Q=E.2Q.17(";",2S);h(3Q==-1)3Q=E.2Q.C;u 5G(E.2Q.1B(2S,3Q));}}u\'\';}};j 4N={2a:k(S,6j){h(6e.32.7h(S+\'=\'))u 6e.32.3v(S+\'=\')[1].3v(\'&\')[0];u 6j;}};j 2K={1l:k(B,2z){j K=$(B).M;K.2z=(2z/1K);K.8P=(2z/1K);K.8O=(2z/1K);K.8l="8n(2z="+2z+")";},5b:k(B,4m,5d,6k){1j=3K.8v(6k/1K);5g=(4m>5d)?-1:1;6p=5g*(5d-4m);U(i=1;i<6p;i++)2l("2K.1l(\'"+B+"\',"+(i*5g+4m)+")",(i*1j));},43:k(B){h($(B)){6.5b(B,1K,10,5a);2l("$(\'"+B+"\').M.1Y=\'3w\'",5a);}},53:k(B){h($(B)){6.1l(B,20);$(B).M.1Y=\'3p\';6.5b(B,20,1K,5a);}}};j 27={8x:A,8y:A,8A:A,8z:A,1N:1m(),42:k(a){h(a){j B=a.B;h(6.1N[B]!=\'\'){6o(6.1N[B]);6.1N[B]=\'\';}6.1N[B]=2l("$(\'"+B+"\').M.6l=\'12\';",35);}},4f:k(a){h(a){j B=a.B;h(6.1N[B]!=\'\'){6o(6.1N[B]);6.1N[B]=\'\';}6.1N[B]=2l("$(\'"+B+"\').M.6l=\'8m\';",35);}},1S:A,6b:L,4l:k(1k,e){h(6.1S){6.6m=Q;6.1S.1J=\'<1k I="\'+1b+\'/W.w?\\\\8o \'+1k.w+\'"/>\';h(E.8p){6.1S.M.2Z=(3f.8r-10)+\'23\';6.1S.M.2v=(3f.8q+20)+\'23\';}o{h(!e)e=1W.3f;6.1S.M.2Z=(e.8C-10)+\'23\';6.1S.M.2v=(e.8N+20)+\'23\';}6.1S.M.1Y=\'3p\';6.6m=L;1k.64=27.6c;}},6c:k(){h(!6.6b)$(\'4l\').M.1Y=\'3w\';},2X:k(62,3o){6.1S=$(62);j 2m;h(3o!==11)2m=E.2n(3o);o 2m=E;j 1H=2m.3r(\'8L\');U(i=0;i<1H.C;i++){1H[i].5Y=k(e){27.4l(6,e);};w=1H[i].63;1H[i].w=w;1H[i].63=\'\';h(1H[i].3Y==\'\')1H[i].3Y=w;h(1H[i].1E==11)1H[i].1E=k(){r.2e(6.w);};}h(2m.5p==11){2m.5p=k(1C){j 5Z=O 5J("(?:^|\\\\s)"+1C+"(?:$|\\\\s)");j 61=2m.3r("*");j 5o=[];j 4c;U(j i=0;(4c=61[i])!=A;i++){j 4d=4c.1C;h(4d&&4d.17(1C)!=-1&&5Z.8K(4d))5o.6a(4c);}u 5o;}}j N=2m.5p(\'1o\');U(i=0;i0){6.2U--;j 1w=O 4i(6.4H());2l(1w,1K);}o 6.3g(A);};6.3t=k(n){h(6.2U>0&&n>0)6.2U=n;o{6.2U=n;6.4H();}};6.7m=k(F,D,3n){j 3b=\'\';h(D==8j){D=F.C-1;}h(D==A){D=F.17(\'{\')+1;h(D<=0){F+=\' \';D=F.C;}o{h(F.5v(D)!=\'}\')D=F.17(\'}\',D)+1;}}j 1R=(3n==A)?D:3n;j i;j t=6.G;j 3d=(F.1B(1,5)=="2v");h(E.1Q){t.1n();j Y=E.1Q.4w();i=6.G.q.C+1;j 2N=Y.7R();3x(2N.7Q()==t&&2N.2h("2r",1)==1)--i;h((3d||1R>=0)&&Y.l.C){h(3d)2k=7;o 2k=1R;h(1R==A)D=F.C+Y.l.C+1;o h(1R=0)&&1X>P){h(3d)2k=7;o 2k=1R;h(1R==A)D=F.C+1X-P+1;o h(1R0)u r.31()+r.7y()+r.74()+r.7d()+r.70()+X;u\'\';};6.1x=k(l){j a=$(\'83\');h(a)a.1J=l;};6.55=k(S){j R=r.4e();37(S){H\'82\':{6.1x(\'8B 3B U 6 22 1F:\');l=r.31()+6.G.q;u r.3E(l,\'[w]{$1u}[/w]\\n\',\'$w {$1u}$ \');}J;H\'92\':{6.1x(\'9J 9z 9y 3B U 6 22 1F:\');l=6.1I();u(\'[67]\'+l+\'[/67]\\n\');}J;H\'9x\':{6.1x(\'9F 3B U 6 22 1F:\');l=6.1I();l=l.V(/\\[/g,\'%5B\');l=l.V(/\\]/g,\'%5D\');u(\'[1k[\'+1b+\'/\'+R+\'.w?\'+l+\']]\');}J;H\'4j\':{6.1x(\'6q 4N 6r 34 6 22 1F:\');l=6.1I();l=l.V(/\\s/g,\'&5q;\');l=l.V(/\\+/g,\'&2d;\');u(1b+\'/\'+R+\'.w?\'+l);}J;H\'9v\':{6.1x(\'6q 9D 4N 6r 34 6 22 1F:\');l=41(6.1I());l=l.V(/\\+/g,\'&2d;\');u(1b+\'/\'+R+\'.w?\'+l);}J;H\'3T\':{6.1x(\'50 3F 8T 3T-9E 1F:\');l=r.31()+6.G.q;u r.3E(l,\'<3T 6L:5l="w">{$1u}\\n\',\'<3F 6L:5l="w">{$1u} \');}J;H\'9G\':{6.1x(\'9B 3B U 6 22 1F:\');l=r.31()+6.G.q;u r.3E(l,\'\\\\f[{$1u}\\\\f]\\n\',\'\\\\f${$1u}\\\\f$ \');}J;H\'9A\':{6.1x(\'50 3F 34 58 6 22 6J a 6H 6I 1F:\');l=6.1I();h(R==\'2y\')u(\'\'+6M(\'6N\',\'2q://1p.48.2p/6S/6R/6Q/6O/6P.6G#5W=8,0,0,0\',\'2o\',\'3y\',\'1U\',\'1K\',\'I\',(1b+\'/2y.w?\'+l),\'6w\',\'6x\',\'6v\',\'2q://39.48.2p/1r/6u\',\'4S\',\'2Z\',\'6s\',\'6t\',\'6y\',\'1W\',\'6z\',\'L\',\'6E\',\'#6D\',\'6C\',\'Q\',\'6A\',\'Q\',\'6B\',(1b+\'/2y.w?\'+l))+\'\');o u(\'<1k I="\'+1b+\'/\'+R+\'.w?\'+l+\'" 3Y="\'+l+\'" />\');}J;H\'9I\':{6.1x(\'50 3F 34 58 6 22 6J a 6H 6I 1F:\');l=6.1I();h(R==\'2y\')u 6M(\'6N\',\'2q://1p.48.2p/6S/6R/6Q/6O/6P.6G#5W=8,0,0,0\',\'2o\',\'3y\',\'1U\',\'1K\',\'I\',(1b+\'/2y.w?\'+l),\'6w\',\'6x\',\'6v\',\'2q://39.48.2p/1r/6u\',\'4S\',\'2Z\',\'6s\',\'6t\',\'6y\',\'1W\',\'6z\',\'L\',\'6E\',\'#6D\',\'6C\',\'Q\',\'6A\',\'Q\',\'6B\',(1b+\'/2y.w?\'+l));o u(\'<1k I="\'+1b+\'/\'+R+\'.w?\'+l+\'" 3Y="\'+l+\'" />\');}J;6Y:{6.1x(\'97 3B U 6 22 1F:\');l=r.31()+6.G.q;u r.3E(l,\'\\\\[{$1u}\\\\]\\n\',\'\\${$1u}\\$ \');}J;}u l;};6.4O=k(l){h(6.56)6.56.1J=l;};6.3V=k(l){h(6.5s)6.5s.1J=l;};6.3g=k(9u){j X=6.G.q;X=X.V(/^\\s+|\\s+$/g,"");h(X.C==0)u Q;j 3G=0;j i;U(i=0;i5V 5P 34 5O 8X (\'+R.8Y()+\')\');J;H\'4a\':1k.I=1b+\'/W.w?\'+X;6.4O(\'<1k I="1i/4a.8Z" 2o="30" 1U="30" 4S="9c" />5V 5P 34 5O 9n (9m)\');J;}6.5N();}}o{h(3G<0)6.3V("<5M/><45 5Q=\\"5R\\">5y 5U 6U <47>5K \'}\' 46 5L 42 \'{\' 46");o 6.3V("<5M/><45 5Q=\\"5R\\">5y 5U 6U <47>42 \'{\' 46 5L 5K \'}\' 46");}6.36=L;};6.44=0;6.3S=k(){j x=6.G.q;6.44++;h(6.44>=3){6.44=0;h(6.1v==0||6.19[6.1v]!=x){h(6.1v>20)6.19.5C();o 6.1v++;6.19[6.1v]=x;}}6.1s=0;};6.3h=k(5A){h(6.1s==0){h(6.1v>20)6.19.5C();o 6.1v++;6.19[6.1v]=6.G.q;}h(6.1s<6.1v){6.1s++;h(6.1s==6.1v&&$(\'3k\'))$(\'3k\').I=2L+"/1i/3a/3h-x.W";j a=$(\'3u\');h(a)a.I=2L+"/1i/3a/3J.W";}o u;z=6.19.C-6.1s-1;h(6.19[z])6.G.q=6.19[z];o 6.G.q=6.19[0];6.G.1n();};6.3J=k(5A){h(6.1s>0){6.1s--;h(6.1s==0&&$(\'3u\'))$(\'3u\').I=2L+"/1i/3a/3J-x.W";j a=$(\'3k\');h(a)a.I=2L+"/1i/3a/3h.W";}o u;j z=6.19.C-6.1s-1;h(6.19[z])6.G.q=6.19[z];o 6.G.q=6.19[0];6.G.1n();};6.7b=k(5z,S){5z(6.55(S));3I.7K(6.G.q);3I.77();};6.4C=k(5F){j w=5F;h(w!==11){w=5G(w);w=w.V(/@2d;/g,\'+\');w=w.V(/&2d;/g,\'+\');w=w.V(/&5q;/g,\' \');r.7w();j i,1G,1r;9e{1r=0;w=w.V(O 5J("^[\\\\s]+","g"),"");i=w.17(\' \');j 4g=w.17(\'}\');h(4g!=-1&&(4g0){6.G.q=w;6.2x();6.3g(A);2K.43(6.2g);}}};h(2f!==11)6.1l(2f,2I,2J,1p,2c);};j 1c=A;j 3I={2w:A,2T:k(7F,l){j 3C=$(\'2T\');h(3C!=A){3C.7r.4G(3C);7L 3C;}j d=O 4n();l=\'7B=\'+d.4W()+\'&\'+l;j 1T=E.3r("1T")[0];j 13=E.3s("13");13.I=5n+\'/\'+7F+\'?\'+l;13.B=\'2T\';1T.2Y(13);},9g:k(){l=r.7t();h(l!=\'\'){6.2T(\'7M.3A\',\'3W=\'+r.14+\'&2j&7O=\'+41(l.V(/\\+/g,"@2d;")));2l(\'3I.5h(A, \\\'5r\\\')\',35);}},9d:k(7J){6.2T(\'7M.3A\',\'3W=\'+r.14+\'&7L=\'+7J);2l(\'3I.5h(A, \\\'5r\\\')\',35);},7K:k(l){h(l!=\'\'){6.2T(\'9l.3A\',\'3W=\'+r.14+\'&2j&7O=\'+41(l.V(/\\+/g,"@2d;")));}},5h:k(3U,3Z){$(\'79\').M.1Y=\'3w\';$(\'76\').M.1Y=\'3p\';h($(\'3X\'))$(\'3X\').1J=\'\';h(3U!==A){h(6.2w!==A)6.2w.1C=\'4T\';3U.1C=\'5j\';6.2w=3U;}1c=O 4V();h(3Z==\'5r\'||3Z==\'9s\'){j d=O 4n();1c.2X(\'3X\',\'3l\',\'3e\',\'1A\',5n+\'/7E.3A?1w=1c&7B=\'+d.4W()+\'&3W=\'+r.14);}o 1c.2X(\'3X\',\'3l\',\'3e\',\'1A\',5n+\'/7E.3A?1w=1c\');1c.2O=1;1c.2F=5;1c.3c=1;1c.5I(3y,1K,60);1c.5H(\'&S=\'+3Z);1c.3D();1c.2G();1c.2H();},77:k(){$(\'76\').M.1Y=\'3w\';$(\'79\').M.1Y=\'3p\';h(6.2w!==A)6.2w.1C=\'4T\';6.2w=A;}};j 2B={2t:O 1m(),1h:O 1m(),2s:O 1m(),4D:O 1m(),16:0,2P:k(2P){U(i=0;i<6.16;i++){h(2P)6.2t[i].1C=\'4T\';o 6.2t[i].1C=\'5j\';}},2j:k(7c,7a,3L,29){j a=$(7a);h(a){6.2t[6.16]=a;6.1h[6.16]=7c;6.2s[6.16]=29;6.4D[6.16]=3L;a.1E=k(e){j i=6.7z;2B.1h[i].7b(2B.4D[i],2B.2s[i]);};a.7z=6.16;6.16++;}}};j r={14:0,93:A,3b:\'\',R:\'W\',18:k(B,v){j s=$(B);h(s)U(j i=0;i\');},9K:k(B){h(B!=6.2M){j 7q=$(B);3x($(6.2M).7s[0]){j 4k=$(6.2M).7s[0];4k.7r.4G(4k);7q.2Y(4k);}6.2M=B;}},3L:A,9P:k(l){h(6.3L!==A)6.3L(l)},7w:k(){6.18(\'R\',\'W\');6.18(\'24\',\'\');6.18(\'25\',\'\');6.18(\'1D\',\'75\');6.18(\'1O\',\'9R\');},2X:k(14,K,1P,3o){27.2X(\'4l\',3o);h(14==\'\'){6.14=1d.2a(\'7p\');h(!6.14){j d=O 4n();6.14=d.4W();1d.1l(\'7p\',14,30);}}o 6.14=14;h(K!==11){6.2j(K,1P);6.T=K;}6.18(\'R\',1d.2a(\'R\'));6.18(\'24\',1d.2a(\'24\'));6.18(\'25\',1d.2a(\'25\'));6.18(\'1D\',1d.2a(\'1D\'));6.18(\'1O\',1d.2a(\'1O\'));$1E(\'3k\',k(e){r.T.3h();});$1E(\'3u\',k(e){r.T.3J();});$2E(\'1O\',k(e){j b=$(\'1O\');h(b){1d.1l(\'1O\',b.q,10);}r.2C();});$2E(\'1D\',k(e){j d=$(\'1D\');h(d){1d.1l(\'1D\',d.q,10);}r.2C();});$2E(\'24\',k(e){j f=$(\'24\');h(f){1d.1l(\'24\',f.q,10);}r.2C();});$2E(\'R\',k(e){j 1f=L;r.7n(r.4e());});$2E(\'25\',k(){j f=$(\'25\');h(f){1d.1l(\'25\',f.q,10);}r.2C();});$1E(\'2b\',k(e){j a=$(\'3P\');h(a)a.26=6.26;r.2C();});$1E(\'3P\',k(e){r.2C();});},2x:k(){h(6.T.2x())2B.2P(Q);},2C:k(){6.T.2x();6.T.3g(A);},4C:k(F){h(6.T!=A)6.T.4C(F);},2e:k(F,D,3n){h(6.T!=A){6.T.7m(F,D,3n);2B.2P(Q);}},4F:k(){6.T.4F();2B.2P(L);},7n:k(S){r.R=S;37(S){H\'W\':1f=L;J;H\'7k\':1f=L;J;H\'4a\':1f=Q;J;H\'2y\':1f=Q;J;H\'8g\':1f=Q;J;}1d.1l(\'R\',S,10);j a=$(\'1D\');h(a){a.7i=1f;a.7o=1f;}a=$(\'1O\');h(a){a.7i=1f;a.7o=1f;}r.T.36=Q;r.T.3g(A);},7t:k(){h(6.T!=A)u 6.T.1I();},4e:k(){j a=$(\'R\');h(a)u a.q;u r.R;},70:k(){j a=$(\'24\');h(a&&a.q!=\'\')u\'\\\\6X\'+a.q+\' \';u\'\';},31:k(){j a=$(\'25\');h(a&&a.q!=\'\')u a.q+\' \';u\'\';},74:k(){j a=$(\'1D\');h(a&&a.q!=\'75\')u\'\\\\1D{\'+a.q+\'} \';u\'\';},7d:k(){j a=$(\'1O\');h(a){j b=a.q.8s();h(b!=\'8u\')u\'\\\\78\'+b+\' \';}u\'\';},7y:k(){j a=$(\'3P\');h(a&&a.26)u\'\\\\2b \';u\'\';},3E:k(l,5c,2b){j a=$(\'2b\');h(a){j b=$(\'3P\');h(a.26){h(!b.26)l=\'\\\\8D \'+l;u 2b.V("{$1u}",l);}o{h(b.26)l=\'\\\\2b \'+l;u 5c.V("{$1u}",l);}}u 5c.V("{$1u}",l);},4o:A,3S:k(){6.T.3S();j a=$(\'3u\');h(a)a.I=2L+"/1i/3a/3J-x.W";a=$(\'3k\');h(a)a.I=2L+"/1i/3a/3h.W";},5T:k(e){j 7S=9;j 1a=6.T.G;h(e.7e==7S){h(E.1Q){j Y=E.1Q.4w();i=1a.q.C+1;j 2N=Y.7R();3x(2N.7Q()==1a&&2N.2h("2r",1)==1)--i;P=i;h(P==1a.q.C)u Q;}o{P=1a.1g;h(P==1a.q.C)u Q;}j a=1a.q.17(\'{\',P);h(a==-1)a=1a.q.C;o a++;j b=1a.q.17(\'&\',P);h(b==-1)b=1a.q.C;o b++;j c=1a.q.17(\'\\\\\\\\\',P);h(c==-1)c=1a.q.C;o c+=2;j D=3K.7G(3K.7G(a,b),c);h(E.1Q){1M=1a.7I();1M.7H(Q);D-=1a.q.1q(0,D).3v("\\n").C-1;1M.5e(\'2r\',D);1M.7C(\'2r\',D);1M.5f();}o 1a.4E(D,D);h(e.7U)e.7U();o e.8w=L;u L;}},7u:k(t){h(E.1Q){t.1n();Y=E.1Q.4w();h(Y.l.C>0)Y.l=\'\';o{Y.5e(\'2r\',1);Y.l=\'\';}Y.5f();}o h(t.1g||t.1g==\'0\'){s=t.1g;e=t.2W;t.q=t.q.1B(0,s)+t.q.1B(e+1,t.q.C);t.1g=s;t.2W=s;t.1n();}},3i:k(38){37(6.3b){H\'\\\\2v\':6.2e(\' \\\\6d \'+38,0);J;H\'\\\\8M\':H\'\\\\8Q\':h(38==\'}\')6.2e(\'}{}\',0);J;H\'\\\\4P\':h(38==\'}\')6.2e(\'} \\\\3O{}\',0);J;6Y:6.2e(38,0);}6.4o=38;},6V:k(e){j 4y;h(1W.3f)4y=1W.3f.7e;o h(e)4y=e.8k;j 2A=8G.8I(4y);h(2A==6.4o)6.7u(6.G);6.4o=A;37(2A){H\'{\':6.3i(\'}\');J;H\'[\':6.3i(\']\');J;H\'(\':6.3i(\')\');J;H\'"\':6.3i(\'"\');J;}h(2A!=\' \'){h(2A==\'\\\\\')6.3b=\'\\\\\';o h(!2A.7h(/^[a-8h-Z]$/))6.3b=\'\';o 6.3b+=2A;}},86:k(4t,7l,F){j t=4t.2n(7l);h(4t.1Q){t.1n();Y=4t.1Q.4w();Y.l=F;}o{j 7g=t.7j;h(t.1g||t.1g==\'0\'){j P=t.1g;j 1X=t.2W;j 2V=P+F.C;t.q=t.q.1B(0,P)+F+t.q.1B(1X,t.q.C);D=F.C+1X-P;t.1g=2V;t.2W=2V;t.1n();t.4E(P+D,P+D);}o t.q+=F;t.7j=7g;}},9w:k(S,28,4Z){h(28===11)28=L;h(4Z===11)28=L;2R="\\\\4P{"+S+((28)?"":"*")+"}";4R="\\n &"+((28)?" ":"= ")+((4Z)?"\\\\l{ h } x= ":"");7x="\\n\\\\3O{"+S+((28)?"":"*")+"}";i=0;1t=71(\'72 73 9H 9O 9Q:\',\'\');h(1t!=\'\'&&1t!==A){n=4x(1t);h(!4Q(n)){U(i=1;i<=n-1;i++)2R=2R+(4R+"\\\\\\\\ ");2R=(2R+4R)+7x;6.2e(2R,S.C+((28)?0:1)+9);}}},9N:k(S,4B,3O){j 33=4B+\'\\\\4P{\'+S+\'7f}\';j 3z="\\n";j 7T="\\n\\\\3O{"+S+"7f}"+3O;j i=0;j 1t=71(\'72 73 96 98 9a 8W a 8V (e.g. "2,3" U 2 90 9b 3 9o):\',\'\');h(1t!==\'\'&&1t!==A){1t=1t.3v(\',\');m=4x(1t[0]);n=4x(1t[1]);h(!4Q(m)&&!4Q(n)){U(i=2;i<=n;i++)3z=3z+\' & \';U(i=1;i<=m-1;i++)33=33+3z+\'\\\\\\\\ \';33=33+3z+7T;6.2e(33,S.C+4B.C+15);}}},1P:k(7P){j x,y;h(7D.7A)y=7D.7A;o h(E.5i&&E.5i.59)y=E.5i.59;o h(E.7N)y=E.7N.59;6.3N[7P].G.M.1U=4x(3K.9h((y-35)/3,40))+\'23\';}};j 52=E.3s(\'6F\');j 68=E.3s(\'1k\');j 4V=k(){};4V.9i={2X:k(2u,3l,3e,1A,4z){6.N=0;6.3c=0;6.1j=10;6.66=2;6.12=0;6.2O=2;6.4v=O 1m();6.3H=O 1m();6.2F=0;6.1e=\'\';6.3M=L;6.65=E.2n(3l);6.5X=E.2n(3e);6.2u=E.2n(2u);h(1A!==\'\')6.1A=E.2n(1A);o 6.1A=A;h(4z.17(\'9j\')>-1){6.1y=A;6.1z=4z;6.21=A;}o{6.1y=4z;6.1z=A;j K=6;6.21=k(){K.5S();};}},5H:k(l){6.1e=l;},5I:k(2o,1U,1j){6.2o=2o;6.1U=1U;6.1j=1j;h(6.3M)6.1L=6.2i=6.1U/6.1j;o 6.1L=6.2i=6.2o/6.1j;},2j:k(3m){j 4r=6.2F;h(6.3M)6.2F+=6.1U;o 6.2F+=6.2o;6.4v[6.N]=3m;6.3H[6.N]=4r;6.N++;h(6.N>6.3c)6.3c=6.N;3m.M.9f=\'9k\';h(6.3M)3m.M.2Z=4r+\'23\';o 3m.M.2v=4r+\'23\';},9r:k(5E){j 5t=E.2n(5E);h(5t)6.2j(5t);},5m:k(1Z){6.2j(1Z);6.2u.2Y(1Z);h(6.12+6.2O>=6.N)6.3D();},5S:k(){h(4u.9q==4){h(4u.9p==35&&4u.5w.C>0){j 1Z=52.4J(L);1Z.1J=4u.5w;6.5m(1Z);}6.2G();6.2H();}},91:k(4Y){h(4Y.C>0){j 1Z=52.4J(L);1Z.1J=4Y;6.5m(1Z);}6.2G();6.2H();},3D:k(){h(6.1y&&6.21){h(6.1y.17("?")==-1)4A(6.1y+\'?1o=\'+6.N+6.1e,6.21);o 4A(6.1y+\'&1o=\'+6.N+6.1e,6.21);}o h(6.1z){j a=6.N;j 1T=E.3r("1T")[0];j 13=E.3s("13");h(6.1z.17("?")==-1)13.I=6.1z+\'?1o=\'+a+6.1e;o 13.I=6.1z+\'&1o=\'+a+6.1e;1T.2Y(13);}},7v:k(){h(6.1z||(6.1y&&6.21)){6.N=0;6.12=0;6.2F=0;3x(6.2u.6T){6.2u.4G(6.2u.6T);}}h(6.1y&&6.21){j K=6;h(6.1y.17("?")==-1)4A(K.1y+\'?1o=\'+6.N+6.1e,K.21);o 4A(K.1y+\'&1o=\'+6.N+6.1e,K.21);}o h(6.1z){j a=6.N;j 1T=E.3r("1T")[0];j 13=E.3s("13");h(6.1z.17("?")==-1)13.I=6.1z+\'?1o=\'+a+6.1e;o 13.I=6.1z+\'&1o=\'+a+6.1e;1T.2Y(13);}},2h:k(4s){6.2F+=4s;U(j p=0;p<6.N;p++){6.3H[p]+=4s;h(6.3M)6.4v[p].M.2Z=6.3H[p]+\'23\';o 6.4v[p].M.2v=6.3H[p]+\'23\';}6.1L++;h(6.1L<6.2i){j K=6;1W.2l(k(){K.2h(4s);},6.66);}},2H:k(){h(6.1A!==A){6.1A.1J=\'\';j F=\'\';j K=6;U(i=0;i<6.3c;i++){2D=68.4J(L);2D.1C=\'1A\';h(i>=6.12&&i<(6.12+6.2O))2D.I="2q://39.4p.2p/1i/4q/87.W";o{2D.I="2q://39.4p.2p/1i/4q/8c.W";2D.i=i;2D.1E=k(){K.6n(6);};}6.1A.2Y(2D);}}},2G:k(){6.65.I=\'2q://39.4p.2p/1i/4q/\'+(6.12<=0?\'8H.W\':\'3l.W\');6.5X.I=\'2q://39.4p.2p/1i/4q/\'+(6.12>=(6.N-1)?\'8R.W\':\'3e.W\');},6n:k(K){h(6.1L==6.2i){1o=K.i;j 5u=1o-6.12;6.1L=6.2i-3K.8t(5u)*6.2i;h(6.12>1o)6.2h(6.1j);o 6.2h(-6.1j);6.12+=5u;h(6.12+6.2O>=6.N)6.3D();o{6.2G();6.2H();}}},2v:k(){h(6.1L==6.2i){h(6.12<(6.N-1)){6.12++;6.1L=0;6.2h(-6.1j);h(6.12+6.2O>=6.N)6.3D();o{6.2G();6.2H();}}}},6d:k(){h(6.1L==6.2i){h(6.12>0){6.1L=0;6.2h(6.1j);6.12--;6.2G();6.2H();}}},8E:k(l){h(l!==\'\')6.1e=(\'&1e=\'+l);o 6.1e=\'\';6.7v();}};', 62, 612, '||||||this|||||||||||if||var|function|text|||else||value|EqEditor||myField|return||latex||||null|id|length|pos|document|txt|equation_input|case|src|break|obj|false|style|panels|new|startPos|true|format|type|targetArea|for|replace|gif|val|sel|||undefined|visible|script|SID||bsize|indexOf|setSelIndx|store_text|inp|EQUATION_ENGINE|gallery|Cookie|subtext|action|selectionStart|bArray_area|images|speed|img|set|Array|focus|panel|download|substr|go|myRedo|dim|TEXT|myUndo|fn|exportMessage|ajax_php|json_php|overview|substring|className|dpi|onclick|is|subtex|areas|getEquationStr|innerHTML|100|step|range|timer|bg|resize|selection|insert_pos|hoverdiv|head|height|targetSize|window|endPos|display|newdiv||ajax_response_fn|equation|px|font|fontsize|checked|Panel|isNumbered|mode|get|inline|intro|plus|insert|preview|intro_text|move|step_total|add|ins_point|setTimeout|divElem|getElementById|width|com|http|character|bArray_mode|bArray_id|maindiv|left|lastbutton|textchanged|swf|opacity|keystr|ExportButton|update|newimg|onchange|new_offset|setarrow|setoverview|input|comment|Opacity|EDITOR_SRC|editor_id|theCaret|visible_num|state|cookie|eqns|c_start|load_json|auton|cursorPos|selectionEnd|init|appendChild|top||getSize|href|matr|to|200|changed|switch|letter|www|buttons|key_text|maxpanels|leftbracket|rightarrow|event|renderEqn|undo|extendkey|textarea_id|undobutton|leftarrow|layer|inspos|editorid|block|c_name|getElementsByTagName|createElement|autorenderEqn|redobutton|split|none|while|600|row|php|markup|old|add_panel|get_inline_wrap|code|bracket|layers_offset|Example|redo|Math|targetFn|vertical|targetArray|end|compressed|c_end|exdate|countclick|pre|button|setcomment|sid|photos|title|group||escape|open|fadeout|clickval|span|brackets|strong|macromedia|addEventListener|pdf|addEvent|element|elementClass|getFormat|close|ii|language|Function|url|oldNode|hover|opacStart|Date|extendchar|codecogs|scroll|offset|dx|wind|req|layers|createRange|parseInt|keycode|newpanel_php|loadXMLDoc|start|load|bArray_fn|setSelectionRange|cleartext|removeChild|renderCountdown|orgtxt|cloneNode|equation_preview|expiredays|curTarget|URL|setdownload|begin|isNaN|eqi|align|lightbluebutton|sval|Scroll|getTime|target|info|isConditional|HTML|_blank|oDiv|fadein|options|exportEquation|equation_download|changeExportArea|embed|clientHeight|800|fade|norm|opacEnd|moveEnd|select|sgn|show|documentElement|greybutton|design|lang|add_panel_div|FAVORITE_ENGINE|results|getElementsByClassName|space|fav|equation_comment|lyr|gap|charAt|responseText|renderbutton|You|fnobj|box||shift||layer_id|initlatex|unescape|set_subtext|set_width|RegExp|closed|than|br|updateExportArea|Download|here|class|orange|add_panel_response|tabHandler|have|Click|version|right_arrow|onmouseover|hasClassName||allElements|hoverbox|alt|onmouseout|left_arrow|pause|tex|oImg|latex_formula|push|hlock|hidehover|right|location|nocookies|auto|wrap|marginLeft|default_val|millisec|overflow|lock|jump|clearTimeout|count|The|link|scale|showall|getflashplayer|pluginspage|quality|high|wmode|devicefont|allowFullScreen|movie|menu|ffffff|bgcolor|div|cab|web|page|into|EDIT_ENGINE|xml|AC_FL_RunContent|codebase|flash|swflash|cabs|shockwave|pub|firstChild|more|keyHandler|change|fn_|default|attachEvent|getFont|prompt|Enter|the|getDPI|110|bar2|hide|bg_|bar1|button_id|Export|textarea|getBG|keyCode|matrix|scrolly|match|disabled|scrollTop|png|textbox|insertText|setFormat|readonly|eqeditor|newNode|parentNode|childNodes|getEquation|backCursor|redraw|reset|eqEnd|getCompressed|exportid|innerHeight|rand|moveStart|self|example_json|file|min|collapse|createTextRange|name|add_history|delete|favorite_json|body|eqn|num|parentElement|duplicate|TABKEY|mend|preventDefault|advert|offsetWidth|setDate|170|addExportArea|attributes|EqTextArea|wp|exportmessage|setadvert|att|addText|soliddot|equationcomment|spacer|keydown|keyup|emptydot|equationview|on|keypress|emf|zA|170px|1000|which|filter|hidden|alpha|200dpi|all|clientX|clientY|toLowerCase|abs|transparent|round|returnValue|plock|ctimer|oid|otimer|Wordpress|pageY|displaystyle|subsearch|toGMTString|String|leftarrow_grey|fromCharCode|expires|test|area|frac|pageX|KhtmlOpacity|MozOpacity|tfrac|rightarrow_grey|getDate|using|svg|comma|by|Image|toUpperCase|jpg|rows|add_panel_json|phpBB|copy_button|key_rext|onfocus|array|LaTeX|dimensions|selected|separated|and|middle|del_fav|do|position|add_fav|max|prototype|_json|absolute|history_json|PDF|Equation|columns|status|readyState|add_id|history|onresize|callback|urlencoded|makeEquationsMatrix|tw|Board|Bulletin|htmledit|DOxygen|EMBED_ENGINE|Encoded|tags|TiddlyWiki|doxygen|number|html|PHP|moveto|javascript|write|makeArrayMatrix|of|copyToTarget|lines|Transparent'.split('|'), 0, {})) /* Copyright (C) 2004-2009 CodeCogs, Zyba Ltd, Broadwood, Holford, TA5 1DU, England. Written by Will Bateman. This is NOT free software, although it can be used freely. You can only be redistributed and/or modify if you own a CodeCogs Commercial Licence for this priduct. This can be purchased from www.codecogs.com You must retain a copy of this licence in all copies. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. */
// --- FCKEditor Integration ---- var oEditor = window.opener; // Loads the equations from the fckeditor, or create a default equations for an example var WYSIWYG = { update : function(text) {	 if (text.length == 0) { return false; }	 oEditor.TinyMCE_Add(text); } }; AC_FL_RunContent = 0; EqnExport=function(text) { WYSIWYG.update(text);	window.blur(); }; window.onload=function() { document.body.innerHTML="
\n < \ / div > \n\n\n\n\n\t\t\n\t\t < \ / div > \n\t\t\t