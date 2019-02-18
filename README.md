# Game of Stakes SQL and Unofficial GoS Results

This repository contains:
- [`gos-sql`](#sql-export-of-gos-database): An SQL export of the [GoS database](https://github.com/castlenode/gos-dump). 
- [Unofficial GoS results](#unofficial-gos-results): Unofficial results of Game of Stakes, computed using `gos-sql`.

## SQL Export of GoS Database

Contains data from:

- GoS up until block `11442`
- GoS3 up until block `330000`
- GoS5 up until block `114240`
- GoS6 up until block `38900`

You can reconstruct `gos-sql` yourself by following the instructions in the [`gos-dump`](https://github.com/castlenode/gos-dump) repository.

### Reconstructing the Database

We had to split the database to upload it on github. Here is how to rebuild it. 

#### Using Winrar

Just download the different parts in the `./winrar` folder and rebuild using `Winrar`.

#### Using `gunzip`

Just use the following command:

```
cat gunzip/gos.sql.gz.* | gunzip > gos.sql
```

### SHA256 of files

f570d561f1d184a1d0e7c9f0ed12239130b0bc03936ed51aa80e0fddc4d9e22c  gos.sql.gz
443dfcfe87db6b1e083ed859bfc485b359b12536a46229535557ca5ec2a7bf71  gos.sql.gz.aa
bc969795405d38116a111ac9e141f41d9f7a12d3241e030cf4a51a086b509287  gos.sql.gz.ab
0914ec5e13b96f94cfce636a48018e3e07ab83429542d109b45f80d8820c6626  gos.sql.gz.ac
5a6a53c693f6616bf7b5c104cbc60f541a022a1c254eb6afcc81f9c7044ee4d6  gos.sql.gz.ad
9a8f24d811816ead6e73ef24c1a6f463ee8d11717d765013b93be4b7f76580c1  gos.sql.gz.ae
79efe2ec3de0e2a2adaf5a051b05464cf6c4bb0ec28e5d00f4eef4f213fa150e  gos.sql.gz.af
df7cadb9ffb373f4e249786be5c9a8d85c5668e19f39e914e479432b7da92528  gos.sql

## Unofficial GoS Results

We have computed the results of Game of Stakes using `gos-sql`. The code used to generate them can be found [here](./score.php). Feel free to verify these results yourself. 

**Note: The results presented hereafter are unofficial. The only official Game of Stakes results will be provided by the Tendermint Team.**

### Global Information

 - Number of blocks: `494582`
 - Number of blocks with more than 70% of voting power: `489259` (98%)
 - game_of_stakes last block: `11442`
 - game_of_stakes_3 last block: `330000`
 - game_of_stakes_5 last block: `114240`
 - game_of_stakes_6 last block: `38900`


### Cumulative Bonded Stake (excluding GoS5)

This tab shows the voting power cumulated over GoS, GoS3 and GoS6. GoS5 has been excluded because some validators did not get vesting stake in genesis.

Top | Name                     | Power    
--- | ------------------------ | ---------
1   | Certus_One               | 2654380  
2   | bharvest                 | 2653679  
3   | ATEAM                    | 2648313  
4   | compass                  | 2643182  
5   | J                        | 2635193  
6   | Castlenode               | 2630429  
7   | JASON                    | 2630393  
8   | loco.block3.community    | 2624590  
9   | node                     | 2612182  
10  | bflabs                   | 2608753  
11  | P2P.ORG_Validator        | 2608632  
12  | Mythos                   | 2592065  
13  | SF                       | 2583929  
14  | Firmamint                | 2577980  
15  | validator.network        | 2569024  
16  | Atom_Guide               | 2555990  
17  | Figment_Networks         | 2551591  
18  | chorusone                | 2542760  
19  | Comdex                   | 2520593  
20  | joesatri                 | 2518278  
21  | StakeCapital             | 2517169  
22  | bruxus                   | 2516707  
23  | StakedGame               | 2516064  
24  | DokiaCapital-ION         | 2515645  
25  | Forbole                  | 2499661  
26  | thomas                   | 2485451  
27  | Cosmostation             | 2456064  
28  | liangping                | 2448750  
29  | Mira                     | 2447805  
30  | Coscloud                 | 2446311  
31  | chinezupwnz              | 2429953  
32  | Umbrella                 | 2400908  
33  | sebytza05                | 2394015  
34  | blockmatrix__            | 2390272  
35  | validatorich             | 2354863  
36  | syncnode                 | 2322854  
37  | Sentinel                 | 2299606  
38  | BouBouNode               | 2267119  
39  | Cryptium_Labs            | 2241882  
40  | kochacolaj               | 2238049  
41  | Coinone_Validator        | 2234942  
42  | kytzumini                | 2185041  
43  | stake.zone               | 2146253  
44  | layover_run              | 2118534  
45  | chainflow012             | 2104749  
46  | BlissDynamics            | 2050476  
47  | clawmvp                  | 2004722  
48  | lunamint                 | 1987601  
49  | Cypher_Core              | 1972175  
50  | nothanks                 | 1888851  


### Missed Blocks

This tab shows the number of missed *precommits* per validator.
- The `66%` column is the regular metric, with all the blocks.
- The `70%` column is the same metric except the blocks with less than 70% voting power are excluded. 
- The `OFF` column shows the number of blocks for which the validator was outside the validator set. Each of these blocks counts as a miss.

Top | Name                     | 66%*   | 70%    | Off   
--- | ------------------------ | ------ | ------ | ------
1   | Certus_One               | 154    | 138    | 0     
2   | validator.network        | 567    | 517    | 0     
3   | ATEAM                    | 719    | 530    | 0     
4   | Castlenode               | 869    | 638    | 0     
5   | J                        | 967    | 538    | 0     
6   | JASON                    | 1021   | 574    | 0     
7   | kochacolaj               | 1429   | 973    | 0     
8   | SF                       | 1710   | 606    | 0     
9   | DokiaCapital-ION         | 1726   | 1172   | 0     
10  | layover_run              | 1914   | 1146   | 0     
11  | blockmatrix__            | 2025   | 1650   | 0     
12  | bharvest                 | 2085   | 708    | 0     
13  | Comdex                   | 2155   | 600    | 0     
14  | loco.block3.community    | 2245   | 1097   | 0     
15  | P2P.ORG_Validator        | 2274   | 878    | 0     
16  | clawmvp                  | 2560   | 2345   | 415   
17  | lunamint                 | 2787   | 2448   | 0     
18  | compass                  | 3031   | 866    | 0     
19  | node                     | 3219   | 1232   | 0     
20  | StakeCapital             | 4042   | 2881   | 0     
21  | Firmamint                | 4974   | 3534   | 0     
22  | Mythos                   | 5613   | 2083   | 0     
23  | thomas                   | 6400   | 3919   | 1472  
24  | Figment_Networks         | 6535   | 5544   | 0     
25  | Mira                     | 6576   | 5250   | 0     
26  | bruxus                   | 6950   | 4121   | 1528  
27  | liangping                | 7096   | 6214   | 2225  
28  | BlissDynamics            | 7479   | 3818   | 0     
29  | joesatri                 | 8070   | 7371   | 27    
30  | Bajun                    | 8351   | 7079   | 1206  
31  | Atom_Guide               | 8475   | 8271   | 148   
32  | Umbrella                 | 9083   | 5353   | 2227  
33  | chorusone                | 9371   | 7786   | 221   
34  | Cosmostation             | 9547   | 4750   | 211   
35  | StakedGame               | 10379  | 6166   | 0     
36  | Forbole                  | 10791  | 6074   | 0     
37  | Coinone_Validator        | 11154  | 6307   | 1387  
38  | validatorich             | 11627  | 10772  | 2290  
39  | Cryptium_Labs            | 12664  | 8952   | 1108  
40  | sebytza05                | 14296  | 13290  | 5471  
41  | Sentinel                 | 14914  | 11500  | 1301  
42  | chinezupwnz              | 15892  | 14453  | 0     
43  | stake.zone               | 17342  | 15425  | 4091  
44  | syncnode                 | 18905  | 17157  | 11520 
45  | Nodebreaker              | 19993  | 17871  | 16125 
46  | BouBouNode               | 20938  | 19359  | 5993  
47  | H3X                      | 27268  | 26934  | 21865 
48  | kytzumini                | 28027  | 27545  | 13094 
49  | Skystar_Capital          | 31782  | 29557  | 19353 
50  | _meleaTrust-_-StakeBank  | 33299  | 32848  | 18425 
51  | wancloud                 | 34598  | 30692  | 15637 
52  | wendi                    | 36077  | 33944  | 31656 
53  | Jun                      | 37612  | 35871  | 23342 
54  | JS                       | 40695  | 38446  | 19588 
55  | wecosmos                 | 42928  | 41215  | 17666 
56  | gruberx                  | 43143  | 42137  | 17348 
57  | 9uh                      | 43624  | 43042  | 8708  
58  | 412a                     | 44964  | 44217  | 16621 
59  | suyuuuuu                 | 52447  | 49922  | 38089 
60  | chainflow012             | 53464  | 52189  | 39363 
61  | Kuende                   | 54998  | 52795  | 23761 
62  | adriana                  | 55296  | 53301  | 44330 
63  | nothanks                 | 55394  | 54087  | 27268 
64  | stelian59                | 55916  | 55116  | 42795 
65  | Cypher_Core              | 57042  | 56463  | 16893 
66  | AFC731937EA71316F4CA3DC0 | 59695  | 57612  | 41506 
67  | crazyone                 | 63001  | 62423  | 54638 
68  | Crytter                  | 80378  | 78502  | 50697 
69  | bunghi                   | 89701  | 89204  | 51135 
70  | gchkn                    | 93407  | 90027  | 83105 
71  | HappyCosmos              | 93563  | 90182  | 68414 
72  | StakerSpace              | 102880 | 101211 | 82128 
73  | neo                      | 114941 | 112680 | 106871
74  | bflabs                   | 115940 | 115642 | 114407
75  | Eliz                     | 118705 | 116395 | 110217
76  | Coscloud                 | 119667 | 116358 | 109645
77  | smith                    | 120896 | 117309 | 108869
78  | Jisus                    | 121611 | 118091 | 110472
79  | ghost                    | 121653 | 117835 | 108599
80  | cifra                    | 122094 | 118133 | 109279
81  | lvl99                    | 122845 | 120571 | 112537
82  | w1m3l                    | 123511 | 119320 | 106539
83  | ferdilol                 | 123853 | 120042 | 111992
84  | persefore                | 125122 | 121489 | 112956
85  | mpaxeVal                 | 130045 | 126295 | 116324
86  | firstblock.io            | 130207 | 129288 | 116342
87  | eruizp1Val               | 131194 | 127486 | 117651
88  | trinity                  | 136491 | 132470 | 118931
89  | spark                    | 139202 | 136458 | 120395
90  | serenity                 | 153355 | 153228 | 153140
91  | Neptune                  | 153366 | 153238 | 153140
92  | 134340-Pluto             | 153367 | 153207 | 153140
93  | Michelle                 | 153377 | 153189 | 153140
94  | Safethecildren           | 153428 | 153297 | 153140
95  | Hydra-validator          | 153504 | 153324 | 153140
96  | cheetah                  | 153528 | 153423 | 153140
97  | Asterilla.one            | 153535 | 153319 | 153140
98  | Apachto                  | 153538 | 153341 | 153140
99  | trustworthy              | 153553 | 153467 | 153140
100 | Bonang                   | 153582 | 153245 | 153140
101 | gandhi                   | 153617 | 153347 | 153140
102 | bing                     | 153624 | 153419 | 153140
103 | Wyver-io                 | 153631 | 153319 | 153140
104 | randomness               | 153639 | 153384 | 153140
105 | DOGE-1337                | 153646 | 153348 | 153140
106 | Kotonami                 | 153656 | 153226 | 153140
107 | AkiyamaTrust             | 153668 | 153305 | 153140
108 | sybil1                   | 153671 | 153429 | 153140
109 | cosmowow                 | 153673 | 153384 | 153140
110 | moonmoon                 | 153703 | 153407 | 153140
111 | Municadianna             | 153712 | 153489 | 153140
112 | doyoulift                | 153736 | 153410 | 153140
113 | Cerberus                 | 153751 | 153443 | 153140
114 | smooth-operator          | 153781 | 153313 | 153140
115 | Pneumonoultramicroscopic | 153793 | 153449 | 153140
116 | TrustThisValidator       | 153803 | 153370 | 153140
117 | Strowberrysmouthy        | 153809 | 153325 | 153140
118 | crazyfrog                | 153833 | 153477 | 153140
119 | Manticore                | 153843 | 153618 | 153140
120 | Karabo                   | 153853 | 153581 | 153140
121 | Aeon                     | 153868 | 153472 | 153140
122 | Kyle-validator           | 153873 | 153403 | 153140
123 | Mintelephantflavored     | 153888 | 153510 | 153140
124 | Magog                    | 153895 | 153442 | 153140
125 | Athituwa                 | 153899 | 153493 | 153140
126 | MissSigma                | 153926 | 153604 | 153140
127 | Hoshino                  | 153946 | 153634 | 153140
128 | bitandether              | 153958 | 153664 | 153140
129 | hotfuzz                  | 153958 | 153414 | 153140
130 | JabuLabs                 | 154033 | 153627 | 153140
131 | Blue-Mary                | 154057 | 153780 | 153140
132 | Milo                     | 154060 | 153535 | 153140
133 | KoreaNumberOne           | 154071 | 153464 | 153140
134 | coolbitbitbit            | 154134 | 153684 | 153140
135 | Obsidian                 | 154153 | 153310 | 153140
136 | Kazuya                   | 154230 | 153815 | 153140
137 | Gammaw                   | 154250 | 153803 | 153140
138 | Knatanoby                | 154252 | 153584 | 153140
139 | Perdulum                 | 154319 | 153904 | 153140
140 | sybil2                   | 154332 | 153801 | 153140
141 | Snowballs                | 154334 | 153839 | 153140
142 | milkydays                | 154346 | 153944 | 153140
143 | Toghterwecanbit          | 154368 | 153570 | 153140
144 | Mochalmond               | 154393 | 153449 | 153140
145 | credence                 | 154439 | 153528 | 153140
146 | lamamama                 | 154472 | 154060 | 153140
147 | weakendiscoming          | 154649 | 153573 | 153140
148 | bitme-partners           | 154666 | 153789 | 153140
149 | sol                      | 154675 | 153943 | 153140
150 | Uranus                   | 154829 | 153479 | 153140
151 | Triton                   | 154873 | 154427 | 153140
152 | Pondelica                | 154898 | 154079 | 153140
153 | Masaki                   | 155133 | 154463 | 153140
154 | Mimas                    | 155175 | 154267 | 153140
155 | Hemingway                | 155368 | 154456 | 153140
156 | Pineapple                | 155898 | 154508 | 153140
157 | Minotaur                 | 155996 | 154858 | 153140
158 | ethereumos               | 156113 | 155589 | 153140
159 | Bison_Trails             | 156154 | 154850 | 143136
160 | communist                | 156418 | 155938 | 153140
161 | Terence                  | 156508 | 152973 | 141212
162 | cha                      | 157729 | 154862 | 143136
163 | jss                      | 157797 | 154929 | 143136
164 | test                     | 159760 | 156784 | 143136
165 | goldwin                  | 171497 | 168740 | 162019
166 | Sikka_BringBackSteak     | 175325 | 172823 | 164558
167 | coronas02                | 177887 | 175418 | 124229
168 | validator                | 181342 | 180628 | 163842
169 | vhxnode1                 | 184250 | 183352 | 162794
170 | PlumbTurst               | 200315 | 199896 | 189437
171 | niobe                    | 206785 | 205214 | 199144
172 | morfeus                  | 208840 | 206716 | 195547
173 | merovingio               | 214652 | 213169 | 207134
174 | Wetez                    | 214860 | 213346 | 194477
175 | hera                     | 221525 | 219908 | 213829
176 | Gold                     | 226252 | 224552 | 171359
177 | javpradel                | 233326 | 230990 | 223139
178 | ijw                      | 244314 | 242060 | 235527
179 | yys                      | 244336 | 242088 | 235529
180 | F4RM                     | 250056 | 247549 | 93461 
181 | stir                     | 258001 | 257703 | 246581
182 | Project_Bohr             | 268096 | 266662 | 246213
183 | Alpiste                  | 272503 | 270145 | 228296
184 | parabailarlabam          | 273310 | 271495 | 265493
185 | iqlusion.io              | 282407 | 280333 | 262225
186 | amar                     | 316951 | 315342 | 302864
187 | edu                      | 319674 | 318046 | 302963
188 | emiliano                 | 329622 | 328452 | 312239
189 | infstones                | 355569 | 355160 | 316534
190 | _fulltrust               | 392004 | 391109 | 383088
191 | Spaghettimonster         | 420283 | 420093 | 410760
192 | crs                      | 441624 | 441165 | 435532
193 | Iron_Shadow              | 472663 | 472439 | 458790
194 | DIANOCHAIN               | 473344 | 473235 | 468527
195 | Assburger                | 473506 | 473360 | 468736
196 | Nautilus                 | 473617 | 473424 | 464087
197 | Stratego                 | 473933 | 473799 | 469169
198 | suitedumonde             | 475715 | 475454 | 468707
199 | ekitcho                  | 476916 | 476621 | 468717
200 | micka                    | 476958 | 476576 | 463965
201 | osmose                   | 477111 | 476758 | 468717
202 | zemya                    | 479369 | 479170 | 468612
203 | lino                     | 483141 | 482937 | 478138
204 | test2                    | 484067 | 483863 | 478822
205 | 09DE3119CCF7C21AED2C5E4E | 485197 | 485067 | 475688
206 | 9F1F031E5BD93AA7EAE9CAD0 | 485368 | 485210 | 480334
207 | XPM4Eva                  | 487754 | 487522 | 478138
208 | C0D14828700CCA51C0526D73 | 493328 | 493250 | 488574
209 | F555F21AB140A75A77B81F10 | 494582 | 494557 | 484830
210 | 6DC6B5A72554F78F22B6AFB9 | 494582 | 494553 | 489373
211 | DF8926474AA4AA2E2B4719B0 | 494582 | 494553 | 489580
212 | 145CE567287B90641FE89575 | 494582 | 494553 | 489580
213 | 05BD458A6D887C80B93A0E69 | 494582 | 494553 | 489580
214 | 8307408CC3D7A752385D43E2 | 494582 | 494553 | 489580
215 | 3816A205F5AB290D4F631844 | 494582 | 494553 | 489580
216 | 1F28DD732747D6650F05783C | 494582 | 494553 | 489580
217 | A261869C6E68D0A67E3AACF5 | 494582 | 494554 | 494323


### Average ranking per 200 blocks window 

For this metric, we divide the chain in windows of 200 blocks, and count the number of missed precommits per window. Then, we do a ranking of validators for each window, and average the results.

- The `Miss` column shows the total number of missed *precommits*
- The `AvgMiss` column shows the average number of missed *precommits* per window of 200 blocks.
- The `AvgRank` columns shows the average rankings in terms of missed precommits per window of 200 blocks.

Top | Name                     | Miss   | AvgMiss   | AvgRank
--- | ------------------------ | ------ | --------- | ------
1   | Certus_One               | 154    | 0.062     | 1.0526
2   | Castlenode               | 869    | 0.351     | 1.1965
3   | clawmvp                  | 2560   | 1.035     | 1.1973
4   | validator.network        | 567    | 0.229     | 1.2026
5   | ATEAM                    | 719    | 0.291     | 1.2167
6   | JASON                    | 1021   | 0.413     | 1.2778
7   | DokiaCapital-ION         | 1726   | 0.698     | 1.2798
8   | lunamint                 | 2787   | 1.127     | 1.292 
9   | J                        | 967    | 0.391     | 1.3106
10  | kochacolaj               | 1429   | 0.578     | 1.3376
11  | blockmatrix__            | 2025   | 0.819     | 1.3841
12  | Atom_Guide               | 8475   | 3.427     | 1.3858
13  | joesatri                 | 8070   | 3.263     | 1.4994
14  | layover_run              | 1914   | 0.774     | 1.5002
15  | liangping                | 7096   | 2.869     | 1.5261
16  | SF                       | 1710   | 0.691     | 1.6696
17  | P2P.ORG_Validator        | 2274   | 0.92      | 1.6971
18  | StakeCapital             | 4042   | 1.634     | 1.7048
19  | loco.block3.community    | 2245   | 0.908     | 1.7311
20  | H3X                      | 27268  | 11.026    | 1.7517
21  | sebytza05                | 14296  | 5.781     | 1.7667
22  | bharvest                 | 2085   | 0.843     | 1.7727
23  | Mira                     | 6576   | 2.659     | 1.7736
24  | validatorich             | 11627  | 4.702     | 1.7776
25  | Comdex                   | 2155   | 0.871     | 1.797 
26  | kytzumini                | 28027  | 11.333    | 1.8435
27  | Firmamint                | 4974   | 2.011     | 1.8516
28  | Figment_Networks         | 6535   | 2.643     | 1.9264
29  | compass                  | 3031   | 1.226     | 1.9863
30  | _meleaTrust-_-StakeBank  | 33299  | 13.465    | 2.1233
31  | chorusone                | 9371   | 3.789     | 2.1617
32  | 412a                     | 44964  | 18.182    | 2.1666
33  | chinezupwnz              | 15892  | 6.426     | 2.2074
34  | node                     | 3219   | 1.302     | 2.2074
35  | thomas                   | 6400   | 2.588     | 2.2264
36  | syncnode                 | 18905  | 7.645     | 2.2628
37  | stake.zone               | 17342  | 7.013     | 2.3207
38  | stelian59                | 55916  | 22.611    | 2.3668
39  | crazyone                 | 63001  | 25.476    | 2.4064
40  | bruxus                   | 6950   | 2.81      | 2.41  
41  | chainflow012             | 53464  | 21.619    | 2.4165
42  | Jun                      | 37612  | 15.209    | 2.4226
43  | BouBouNode               | 20938  | 8.467     | 2.4557
44  | 9uh                      | 43624  | 17.64     | 2.4949
45  | Nodebreaker              | 19993  | 8.085     | 2.5297
46  | wendi                    | 36077  | 14.588    | 2.5378
47  | Cypher_Core              | 57042  | 23.066    | 2.5443
48  | Skystar_Capital          | 31782  | 12.852    | 2.5592
49  | Bajun                    | 8351   | 3.377     | 2.6122
50  | wecosmos                 | 42928  | 17.359    | 2.6385

A nice graphic for the top20 ;)

![Average misses per 200 blocks window graphic](./GoS.jpg)


## Proposer responsible for most misses per validator

For each validator, we show the validator that most often was the proposer who failed to include their precommit. We also give the percentage of missed block said proposer is responsible for.

Name                     | Proposer                 | %   
------------------------ | ------------------------ | ----
Certus_One               | communist                | 59% 
validator.network        | validatorich             | 42% 
ATEAM                    | PlumbTurst               | 24% 
Castlenode               | validatorich             | 18% 
J                        | validatorich             | 29% 
JASON                    | validatorich             | 27% 
kochacolaj               | gruberx                  | 12% 
SF                       | validatorich             | 46% 
DokiaCapital-ION         | validatorich             | 7%  
layover_run              | node                     | 17% 
blockmatrix__            | validatorich             | 16% 
bharvest                 | validatorich             | 47% 
Comdex                   | gruberx                  | 28% 
loco.block3.community    | validatorich             | 35% 
P2P.ORG_Validator        | validatorich             | 28% 
clawmvp                  | communist                | 3%  
lunamint                 | communist                | 4%  
compass                  | node                     | 33% 
node                     | validatorich             | 47% 
StakeCapital             | validatorich             | 17% 
Firmamint                | validatorich             | 17% 
Mythos                   | validatorich             | 28% 
thomas                   | node                     | 15% 
Figment_Networks         | validatorich             | 8%  
Mira                     | validatorich             | 9%  
bruxus                   | node                     | 15% 
liangping                | gruberx                  | 5%  
BlissDynamics            | gruberx                  | 19% 
joesatri                 | node                     | 3%  
Bajun                    | gruberx                  | 6%  
Atom_Guide               | validatorich             | 3%  
Umbrella                 | validatorich             | 20% 
chorusone                | validatorich             | 13% 
Cosmostation             | validatorich             | 21% 
StakedGame               | validatorich             | 17% 
Forbole                  | validatorich             | 19% 
Coinone_Validator        | validatorich             | 18% 
validatorich             | SF                       | 3%  
Cryptium_Labs            | validatorich             | 16% 
sebytza05                | node                     | 2%  
Sentinel                 | validatorich             | 10% 
chinezupwnz              | validatorich             | 3%  
stake.zone               | node                     | 5%  
syncnode                 | gruberx                  | 4%  
Nodebreaker              | validatorich             | 10% 
BouBouNode               | validatorich             | 4%  
H3X                      | validatorich             | 0%  
kytzumini                | node                     | 0%  
Skystar_Capital          | gruberx                  | 3%  
_meleaTrust-_-StakeBank  | node                     | 0%  


### List of blocks removed because of censorship

Several instances of isolated precommit censorship were spotted during Game of Stakes. Validator censorship is trivial to implement but very damaging for the validator with regards to the Missed precommits metric. It is also hard to defend against. While it is not explicitly out of bounds for GoS, we still wanted to recompute the precommits-related metric and exclude the blocks where censorship happened to see what would be the difference. 

*Note: If you spotted a rogue censorship attack that concern you, feel free to report it in the Issues. We will add it to the list*

#### Censure By Validatorich

`Validatorich` committed censorship attack at the end of GoS against the following validators: Validator.network, CypherCore, nothanks, block3, Sentinel, Atom-Guide, StakeCapital and morfeus. [They claimed it themselves in GoS Riot chat room](https://matrix.to/#/!RKBbCjMEiDPKKewRIE:matrix.org/$155005829916129PNjjS:matrix.org?via=matrix.org&via=t2bot.io). The censorship can be verified with the following query:

```
select sum(miss) FROM blockvals WHERE proposerid=81 AND validatorid=76 AND chain='game_of_stakes_6' AND blocktime > '2019–02–14 07:18:56'
```

Chain            | Height
---------------- | ------
game_of_stakes_6 | 29507,29577,29651,29720,29789,29863,29935,30002,30075,30143
game_of_stakes_6 | 30213,30282,30351,30421,30494,30564,30635,30706,30775,30846
game_of_stakes_6 | 30918,30988,31059,31128,31196,31269,31348,31413,31488,31559
game_of_stakes_6 | 31630,31703,31774,31844,31913,31987,32060,32129,32202,32271
game_of_stakes_6 | 32342,32413,32483,32559,32630,32700,32771,32844,32911,32986
game_of_stakes_6 | 33058,33126,33200,33272,33342,33413,33485,33559,33632,33698
game_of_stakes_6 | 33773,33845,33915,33988,34060,34129,34204,34270,34341,34415
game_of_stakes_6 | 34484,34557,34631,34704,34775,34843,34918,34989,35061,35133
game_of_stakes_6 | 35204,35277,35348,35418,35487,35554,35629,35702,35773,35848
game_of_stakes_6 | 35920,35989,36063,36128,36201,36272,36344,36417,36492,36557
game_of_stakes_6 | 36627,36703,36773,36846,36913,36989,37060,37128,37198,37272
game_of_stakes_6 | 37339,37409,37486,37560,37626,37695,37770,37841,37911,37978
game_of_stakes_6 | 38051,38125,38197,38269,38339,38407,38484,38552,38624,38697
game_of_stakes_6 | 38769,38837

#### Censure By Communist

This censorship was reported by `Certus One`. It occurred during `GoS3`. We accepted this report as a valid report because `Communist` is responsible for `59%` of all missed *precommits* from `Certus One` (see [this tab](#proposer-responsible-for-most-misses-per-validator)).

Chain            | Height
---------------- | ------
game_of_stakes_3 | 131028,132181,145149,146785,149561,152489,153136,155254,164176,165802
game_of_stakes_3 | 179965,193265,195148,208689,212978,213432,214200,214805,214953,215552
game_of_stakes_3 | 215703,220817,221117,221720,222326,223083,228589,229670,231714,235937
game_of_stakes_3 | 237428,242196,243557,248420,249087,249355,250301,250571,250839,251243
game_of_stakes_3 | 251380,252592,253806,255288,255691,256635,257043,261607,262938,264816
game_of_stakes_3 | 267619,268819,270277,272543,273607,274000,276401,276537,282672,283869
game_of_stakes_3 | 284408,284803,285468,289048,290108,291305,292369,296627,300746,302082
game_of_stakes_3 | 303418,304479,309535,310996,311389,314306,318156,318290,318818,322007
game_of_stakes_3 | 323467,324400,324667,325197,325331,325593,325594,326788,328907,329173
game_of_stakes_3 | 329964


### Missed Blocks (without censorship)

Top | Name                     | 66%*   | 70%    | Off   
--- | ------------------------ | ------ | ------ | ------
1   | Certus_One               | 63     | 47     | 0     
2   | validator.network        | 428    | 378    | 0     
3   | ATEAM                    | 710    | 521    | 0     
4   | Castlenode               | 733    | 502    | 0     
5   | J                        | 961    | 532    | 0     
6   | JASON                    | 1010   | 563    | 0     
7   | kochacolaj               | 1427   | 971    | 0     
8   | SF                       | 1700   | 596    | 0     
9   | DokiaCapital-ION         | 1725   | 1171   | 0     
10  | layover_run              | 1908   | 1140   | 0     
11  | blockmatrix__            | 2015   | 1640   | 0     
12  | bharvest                 | 2081   | 704    | 0     
13  | loco.block3.community    | 2108   | 960    | 0     
14  | Comdex                   | 2149   | 594    | 0     
15  | P2P.ORG_Validator        | 2267   | 871    | 0     
16  | clawmvp                  | 2554   | 2339   | 415   
17  | lunamint                 | 2780   | 2441   | 0     
18  | compass                  | 3022   | 857    | 0     
19  | node                     | 3214   | 1227   | 0     
20  | StakeCapital             | 3974   | 2813   | 0     
21  | Firmamint                | 4968   | 3528   | 0     
22  | Mythos                   | 5604   | 2074   | 0     
23  | thomas                   | 6389   | 3908   | 1472  
24  | Figment_Networks         | 6529   | 5538   | 0     
25  | Mira                     | 6576   | 5250   | 0     
26  | bruxus                   | 6943   | 4114   | 1528  
27  | liangping                | 7089   | 6207   | 2225  
28  | BlissDynamics            | 7479   | 3818   | 0     
29  | joesatri                 | 8070   | 7371   | 27    
30  | Atom_Guide               | 8336   | 8132   | 148   
31  | Bajun                    | 8340   | 7068   | 1206  
32  | Umbrella                 | 9069   | 5339   | 2227  
33  | chorusone                | 9366   | 7781   | 221   
34  | Cosmostation             | 9547   | 4750   | 211   
35  | StakedGame               | 10367  | 6154   | 0     
36  | Forbole                  | 10790  | 6073   | 0     
37  | Coinone_Validator        | 11147  | 6300   | 1387  
38  | validatorich             | 11627  | 10772  | 2290  
39  | Cryptium_Labs            | 12664  | 8952   | 1108  
40  | sebytza05                | 14276  | 13270  | 5471  
41  | Sentinel                 | 14826  | 11412  | 1301  
42  | chinezupwnz              | 15885  | 14446  | 0     
43  | stake.zone               | 17331  | 15414  | 4091  
44  | syncnode                 | 18896  | 17148  | 11520 
45  | Nodebreaker              | 19993  | 17871  | 16125 
46  | BouBouNode               | 20937  | 19358  | 5993  
47  | H3X                      | 27190  | 26856  | 21865 
48  | kytzumini                | 28027  | 27545  | 13094 
49  | Skystar_Capital          | 31774  | 29549  | 19353 
50  | _meleaTrust-_-StakeBank  | 33296  | 32845  | 18425 


### Average ranking per 200 blocks window (without censorship)

Top | Name                     | Miss   | AvgMiss   | AvgRank
--- | ------------------------ | ------ | --------- | ------
1   | Certus_One               | 63     | 0.025     | 1.0158
2   | Castlenode               | 733    | 0.296     | 1.1431
3   | validator.network        | 428    | 0.173     | 1.1476
4   | clawmvp                  | 2554   | 1.033     | 1.1949
5   | ATEAM                    | 710    | 0.287     | 1.2131
6   | JASON                    | 1010   | 0.408     | 1.2734
7   | DokiaCapital-ION         | 1725   | 0.698     | 1.2794
8   | lunamint                 | 2780   | 1.124     | 1.2891
9   | J                        | 961    | 0.389     | 1.3081
10  | Atom_Guide               | 8336   | 3.371     | 1.3316
11  | kochacolaj               | 1427   | 0.577     | 1.3368
12  | blockmatrix__            | 2015   | 0.815     | 1.3809
13  | layover_run              | 1908   | 0.772     | 1.4978
14  | joesatri                 | 8070   | 3.263     | 1.4994
15  | liangping                | 7089   | 2.867     | 1.5237
16  | SF                       | 1700   | 0.687     | 1.6656
17  | loco.block3.community    | 2108   | 0.852     | 1.6769
18  | StakeCapital             | 3974   | 1.607     | 1.6793
19  | P2P.ORG_Validator        | 2267   | 0.917     | 1.6947
20  | H3X                      | 27182  | 10.992    | 1.721 
21  | sebytza05                | 14276  | 5.773     | 1.7594
22  | validatorich             | 11627  | 4.702     | 1.7699
23  | bharvest                 | 2081   | 0.841     | 1.7711
24  | Mira                     | 6576   | 2.659     | 1.774 
25  | Comdex                   | 2149   | 0.869     | 1.7946
26  | kytzumini                | 28027  | 11.333    | 1.8435
27  | Firmamint                | 4968   | 2.009     | 1.8492
28  | Figment_Networks         | 6529   | 2.64      | 1.9244
29  | compass                  | 3022   | 1.222     | 1.9826
30  | _meleaTrust-_-StakeBank  | 33296  | 13.464    | 2.1233
31  | chorusone                | 9366   | 3.787     | 2.1593
32  | 412a                     | 44958  | 18.18     | 2.1646
33  | chinezupwnz              | 15885  | 6.423     | 2.2038
34  | node                     | 3214   | 1.3       | 2.2054
35  | thomas                   | 6389   | 2.584     | 2.2224
36  | syncnode                 | 18896  | 7.641     | 2.2592
37  | stake.zone               | 17331  | 7.008     | 2.3195
38  | stelian59                | 55916  | 22.611    | 2.3672
39  | crazyone                 | 63001  | 25.476    | 2.4068
40  | bruxus                   | 6943   | 2.808     | 2.4076
41  | chainflow012             | 53464  | 21.619    | 2.4165
42  | Jun                      | 37588  | 15.199    | 2.4173
43  | BouBouNode               | 20937  | 8.466     | 2.4553
44  | Cypher_Core              | 56910  | 23.013    | 2.4921
45  | 9uh                      | 43615  | 17.636    | 2.4941
46  | wendi                    | 35934  | 14.531    | 2.514 
47  | Nodebreaker              | 19993  | 8.085     | 2.5297
48  | Skystar_Capital          | 31774  | 12.848    | 2.556 
49  | Bajun                    | 8340   | 3.372     | 2.6082
50  | wecosmos                 | 42904  | 17.349    | 2.6345
