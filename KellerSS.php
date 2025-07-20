<?php

$branco = "\e[97m";
$preto = "\e[30m\e[1m";
$amarelo = "\e[93m";
$laranja = "\e[38;5;208m";
$azul   = "\e[34m";
$lazul  = "\e[36m";
$cln    = "\e[0m";
$verde  = "\e[92m";
$fverde = "\e[32m";
$vermelho    = "\e[91m";
$magenta = "\e[35m";
$azulbg = "\e[44m";
$lazulbg = "\e[106m";
$verdebg = "\e[42m";
$lverdebg = "\e[102m";
$amarelobg = "\e[43m";
$lamarelobg = "\e[103m";
$vermelhobg = "\e[101m";
$cinza = "\e[37m";
$ciano = "\e[36m";
$bold   = "\e[1m";
function keller_banner(){
  echo "\e[37m
           KellerSS Android\e[36m Fucking Cheaters\e[91m\e[37m discord.gg/allianceoficial\e[91m
            
                            )       (     (          (     
                        ( /(       )\ )  )\ )       )\ )  
                        )\()) (   (()/( (()/(  (   (()/(  
                        |((_)\  )\   /(_)) /(_)) )\   /(_)) 
                        |_ ((_)((_) (_))  (_))  ((_) (_))   
                        | |/ / | __|| |   | |   | __|| _ \  
                        ' <  | _| | |__ | |__ | _| |   /  
                        _|\_\ |___||____||____||___||_|_\  



                    \e[36m{C} Coded By - KellerSS | Credits for Sheik                                   
\e[32m
  \n";
}


echo $cln;

function atualizar()
{
    global $cln, $bold, $fverde;
    echo "\n\e[91m\e[1m[+] KellerSS Updater [+]\nAtualizando, por favor aguarde...\n\n$cln";
    system("git fetch origin && git reset --hard origin/master && git clean -f -d");
    echo $bold . $fverde . "[i] Atualização concluida! Por favor reinicie o Scanner \n" . $cln;
    exit;
}

function inputusuario($message){
  global $branco, $bold, $verdebg, $vermelhobg, $azulbg, $cln, $lazul, $fverde;
  $amarelobg = "\e[100m";
  $inputstyle = $cln . $bold . $lazul . "[#] " . $message . ": " . $fverde ;
echo $inputstyle;
}

system("clear");
keller_banner();
sleep(5);
echo "\n";

menuscanner:

    echo $bold . $azul . "
      +--------------------------------------------------------------+
      +                       KellerSS Menu                          +
      +--------------------------------------------------------------+

      \n\n";
      echo $amarelo . " [0]  Conectar ADB$branco (Pareamento e conexão via ADB)$fverde \n [1]  Escanear FreeFire Normal \n$fverde [2]  Escanear FreeFire Max \n {$vermelho}[S]  Sair \n\n" . $cln;
escolheropcoes:
    inputusuario("Escolha uma das opções acima");
    $opcaoscanner = trim(fgets(STDIN, 1024));


    if (!in_array($opcaoscanner, array(
      '0',
      '1',
      '2',	
      'S',
  ), true))
    {
      echo $bold . $vermelho . "\n[!] Opção inválida! Tente novamente. \n\n" . $cln;
      goto escolheropcoes;
    }
    else
    {
        if ($opcaoscanner == "0") {
            system("clear");
            keller_banner();
            
            // Verificar e instalar android-tools se necessário
            echo $bold . $azul . "[+] Verificando se o ADB está instalado...\n" . $cln;
            if (!shell_exec("adb version > /dev/null 2>&1"))
            {
                echo $bold . $amarelo . "[!] ADB não encontrado. Instalando android-tools...\n" . $cln;
                system("pkg install android-tools -y");
                echo $bold . $fverde . "[i] Android-tools instalado com sucesso!\n\n" . $cln;
            } else {
                echo $bold . $fverde . "[i] ADB já está instalado.\n\n" . $cln;
            }
            
            // Pareamento ADB
            inputusuario("Qual a sua porta para o pareamento (ex: 45678)?");
            $pair_port = trim(fgets(STDIN, 1024));
            if (!empty($pair_port) && is_numeric($pair_port)) {
                echo $bold . $amarelo . "\n[!] Agora, digite o código de pareamento que aparece no seu celular e pressione Enter.\n" . $cln;
                system("adb pair localhost:" . $pair_port);
            } else {
                echo $bold . $vermelho . "\n[!] Porta inválida! Retornando ao menu.\n\n" . $cln;
                sleep(2);
                system("clear");
                keller_banner();
                goto menuscanner;
            }
            
            echo "\n";
            
            // Conexão ADB
            inputusuario("Qual a sua porta para a conexão (ex: 12345)?");
            $connect_port = trim(fgets(STDIN, 1024));
            if (!empty($connect_port) && is_numeric($connect_port)) {
                echo $bold . $amarelo . "\n[!] Conectando ao dispositivo...\n" . $cln;
                system("adb connect localhost:" . $connect_port);
                echo $bold . $fverde . "\n[i] Processo de conexão finalizado. Verifique a saída acima para ver se a conexão foi bem-sucedida.\n" . $cln;
                echo $bold . $branco . "\n[+] Pressione Enter para voltar ao menu...\n" . $cln;
                fgets(STDIN, 1024);
                system("clear");
                keller_banner();
                goto menuscanner;
            } else {
                echo $bold . $vermelho . "\n[!] Porta inválida! Retornando ao menu.\n\n" . $cln;
                sleep(2);
                system("clear");
                keller_banner();
                goto menuscanner;
            }
        } elseif ($opcaoscanner == "1") {
            system("clear");
            keller_banner();

            if (!shell_exec("adb version > /dev/null 2>&1"))
            {
                system("pkg install -y android-tools > /dev/null 2>&1");
            }


            date_default_timezone_set('America/Sao_Paulo');
            shell_exec('adb start-server > /dev/null 2>&1');

    

            $comandoDispositivos = shell_exec("adb devices 2>&1");

                if (empty($comandoDispositivos) || strpos($comandoDispositivos, "device") === false || strpos($comandoDispositivos, "no devices") !== false) {
                    echo "\033[1;31m[!] Nenhum dispositivo encontrado. Faça o pareamento de IP ou conecte um dispositivo via USB.\n\n";
                    exit;
                }

                $comandoVerificarFF = shell_exec("adb shell pm list packages --user 0 | grep com.dts.freefireth 2>&1");


                if (!empty($comandoVerificarFF) && strpos($comandoVerificarFF, "more than one device/emulator") !== false) {
                    echo $bold . $vermelho . "[!] Pareamento realizado de maneira incorreta, digite \"adb disconnect\" e refaça o processo.\n\n";
                    exit;
                }
                
                if (!empty($comandoVerificarFF) && strpos($comandoVerificarFF, "com.dts.freefireth") !== false) {
                } else {
                    echo $bold . $vermelho . "[!] O FreeFire está desinstalado, cancelando a telagem...\n\n";
                    exit;
                }


                $comandoVersaoAndroid = "adb shell getprop ro.build.version.release";
                $resultadoVersaoAndroid = shell_exec($comandoVersaoAndroid);

                if (!empty($resultadoVersaoAndroid)) {
                    echo $bold . $azul . "[+] Versão do Android: " . trim($resultadoVersaoAndroid) . "\n";
                } else {
                    echo $bold . $vermelho . "[!] Não foi possível obter a versão do Android.\n";
                }


                $comandoSu = 'su 2>&1';
                $resultadoSu = shell_exec($comandoSu);

                echo $bold . $azul . "[+] Checando se possui Root (se o programa travar, root detectado)...\n";
                if (!empty($resultadoSu) && strpos($resultadoSu, 'No su program found') !== false) {
                    echo $bold . $fverde . "[-] O dispositivo não tem root.\n\n";
                } else {
                    echo $bold . $vermelho . "[+] Root detectado no dispositivo Android.\n\n";
                }
                


            echo $bold . $azul . "[+] Checando se o dispositivo foi reiniciado recentemente...\n";
            $comandoUPTIME = shell_exec("adb shell uptime");

            if (preg_match('/up (\d+) min/', $comandoUPTIME, $filtros)) {
                $minutos = $filtros[1];
                echo $bold . $vermelho . "[!] O dispositivo foi iniciado recentemente (há $minutos minutos).\n\n";
            } else {
                echo $bold . $fverde . "[i] Dispositivo não reiniciado recentemente.\n\n";
            }


            $logcatTime = shell_exec("adb logcat -d -v time | head -n 2");
                preg_match('/(\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $logcatTime, $matchTime);

                if (!empty($matchTime[1])) {

                    $date = DateTime::createFromFormat('m-d H:i:s', $matchTime[1]);
                    $formattedDate = $date->format('d-m H:i:s'); 

                    echo $bold . $amarelo . "[+] Primeira log do sistema: " . $formattedDate . "\n";
                    echo $bold . $branco . "[+] Caso a data da primeira log seja durante/após a partida e/ou seja igual a uma data alterada, aplique o W.O!\n\n";

                } else {
                    echo $bold . $vermelho . "[!] Não foi possível capturar a data/hora do sistema.\n\n";
                }
            
            echo $bold . $azul . "[+] Verificando mudanças de data/hora...\n";

                
            $logcatOutput = shell_exec('adb logcat -d | grep "UsageStatsService: Time changed" | grep -v "HCALL"');

            if ($logcatOutput !== null && trim($logcatOutput) !== "") {
                $logLines = explode("\n", trim($logcatOutput));
            } else {
                echo $bold . $vermelho . "[!] Erro ao obter logs de modificação de data/hora, verifique a data da primeira log do sistema.\n\n";
            }


            $fusoHorario = trim(shell_exec('adb shell getprop persist.sys.timezone'));

            if ($fusoHorario !== "America/Sao_Paulo") {
                echo $bold . $amarelo . "[!] Aviso: O fuso horário do dispositivo é '$fusoHorario', diferente de 'America/Sao_Paulo', possivel tentativa de Bypass.\n\n";
            }

            $dataAtual = date("m-d");

            $logsAlterados = [];

            if (!empty($logLines)) {
                foreach ($logLines as $line) {
                    if (empty($line)) continue;

                    preg_match('/(\d{2}-\d{2}) (\d{2}:\d{2}:\d{2}\.\d{3}).*Time changed in.*by (-?\d+) second/', $line, $matches);

                    if (!empty($matches) && $matches[1] === $dataAtual) {
                        list($hora, $minuto, $segundoComDecimal) = explode(":", $matches[2]);
                        $segundo = (int)floor($segundoComDecimal);

                        $horaAntiga = mktime($hora, $minuto, $segundo, substr($matches[1], 0, 2), substr($matches[1], 3, 2), date("Y"));

                        $segundosAlterados = (int)$matches[3];

                        $horaNova = ($segundosAlterados > 0) ? $horaAntiga - $segundosAlterados : $horaAntiga + abs($segundosAlterados);

                        $dataAntiga = date("d-m H:i", $horaAntiga);
                        $horaAntigaFormatada = date("H:i", $horaAntiga);
                        $horaNovaFormatada = date("H:i", $horaNova);
                        $dataNova = date("d-m", $horaNova);

                        $logsAlterados[] = [
                            'horaAntiga' => $horaAntiga,
                            'horaNova' => $horaNova,
                            'horaAntigaFormatada' => $horaAntigaFormatada,
                            'horaNovaFormatada' => $horaNovaFormatada,
                            'acao' => ($segundosAlterados > 0) ? 'Atrasou' : 'Adiantou',
                            'dataAntiga' => $dataAntiga,
                            'dataNova' => $dataNova
                        ];
                    }
                }
            }

            if (!empty($logsAlterados)) {
                usort($logsAlterados, function ($a, $b) {
                    return $b['horaAntiga'] - $a['horaAntiga'];
                });

                foreach ($logsAlterados as $log) {
                    echo $bold . $amarelo . "[!] Alterou horário de {$log['dataAntiga']} para {$log['dataNova']} {$log['horaNovaFormatada']} ({$log['acao']} horário)\n";
                }
            } else {
                echo $bold . $vermelho . "[!] Nenhum log de alteração de horário encontrado.\n\n";
            }

        
            
            echo $bold . $azul . "\n[+] Checando se modificou data e hora...\n";
            $autoTime = trim(shell_exec('adb shell settings get global auto_time'));
            $autoTimeZone = trim(shell_exec('adb shell settings get global auto_time_zone'));

            if ($autoTime !== "1" || $autoTimeZone !== "1") {
                echo $bold . $vermelho . "[!] Possível bypass detectado: data e hora/furo horário automático desativado.\n";
            } else {
                echo $bold . $fverde . "[i] Data e hora/fuso horário automático estão ativados.\n";
            }

            echo $bold . $branco . "[+] Caso haja mudança de horário durante/após a partida, aplique o W.O!\n\n";


            echo $bold . $azul . "[+] Obtendo os últimos acessos do Google Play Store...\n";

            $comandoUSAGE = shell_exec("adb shell dumpsys usagestats 2>/dev/null | grep -i 'MOVE_TO_FOREGROUND' 2>/dev/null | grep 'package=com.android.vending' 2>/dev/null | awk -F'time=\"' '{print \$2}' 2>/dev/null | awk '{gsub(/\"/, \"\"); print \$1, \$2}' 2>/dev/null | tail -n 5 2>/dev/null");

            if (!is_null($comandoUSAGE) && trim($comandoUSAGE) !== "") {
                echo $bold . $fverde . "[i] Últimos 5 acessos:\n";
                echo $amarelo . $comandoUSAGE . "\n";
            } else {
                echo $bold . "\e[31m[!] Nenhum dado encontrado.\n";
            }
            echo $bold . $branco . "[+] Caso haja acesso durante/após a partida, aplique o W.O!\n\n";

            echo $bold . $azul . "[+] Obtendo os últimos textos copiados...\n";

            $comando = "adb logcat -d 2>/dev/null | grep 'hcallSetClipboardTextRpc' 2>/dev/null | sed -E 's/^([0-9]{2}-[0-9]{2}) ([0-9]{2}:[0-9]{2}:[0-9]{2}).*hcallSetClipboardTextRpc\\(([^)]*)\\).*$/\\1 \\2 \\3/' 2>/dev/null | tail -n 10 2>/dev/null";
            $saida = shell_exec($comando);

            if (!is_null($saida)) {
                $linhas = explode("\n", trim($saida));
                
                foreach ($linhas as $linha) {
                    if (!empty($linha) && preg_match('/^([0-9]{2}-[0-9]{2}) ([0-9]{2}:[0-9]{2}:[0-9]{2}) (.+)$/', $linha, $matches)) {
                        $data = $matches[1];
                        $hora = $matches[2];
                        $conteudo = $matches[3];

                        echo $bold . $amarelo . "[!] " . $data . " " . $hora . " " . $branco . "$conteudo" . "\n";
                    }
                }
            } else {
                echo $bold . "\e[31m[!] Nenhum dado encontrado.\n";
            }

            echo "\n";



            echo $bold . $azul . "[+] Checando se o replay foi passado...\n";

                $comandoArquivos = 'adb shell "ls -t /sdcard/Android/data/com.dts.freefireth/files/MReplays/*.bin 2>/dev/null"';
                $output = shell_exec($comandoArquivos) ?? '';
                $arquivos = array_filter(explode("\n", trim($output)));
                
                $motivos = [];
                $arquivoMaisRecente = null;
                $ultimoModifyTime = null;
                $ultimoChangeTime = null;
                
                // Motivo 10 - Nenhum replay encontrado
                if (empty($arquivos)) {
                    $motivos[] = "Motivo 10 - Nenhum arquivo .bin encontrado na pasta MReplays";
                }
                
                foreach ($arquivos as $indice => $arquivo) {
                    $resultadoStat = shell_exec('adb shell "stat ' . escapeshellarg($arquivo) . '"');
                
                    if (
                        preg_match('/Access: (.*?)\n/', $resultadoStat, $matchAccess) &&
                        preg_match('/Modify: (.*?)\n/', $resultadoStat, $matchModify) &&
                        preg_match('/Change: (.*?)\n/', $resultadoStat, $matchChange)
                    ) {
                        $dataAccess = trim(preg_replace('/ -\d{4}$/', '', $matchAccess[1]));
                        $dataModify = trim(preg_replace('/ -\d{4}$/', '', $matchModify[1]));
                        $dataChange = trim(preg_replace('/ -\d{4}$/', '', $matchChange[1]));
                
                        $accessTime = strtotime($dataAccess);
                        $modifyTime = strtotime($dataModify);
                        $changeTime = strtotime($dataChange);
                
                        if ($indice === 0) {
                            $ultimoModifyTime = $modifyTime;
                            $ultimoChangeTime = $changeTime;
                        }
                
                        // Motivo 1 - Access posterior ao Modify
                        if ($accessTime > $modifyTime) {
                            $motivos[] = "Motivo 1 - Access posterior ao Modify " . basename($arquivo);
                        }
                
                        // Motivo 2 - Timestamps com .000
                        if (
                            preg_match('/\.0+$/', $dataAccess) ||
                            preg_match('/\.0+$/', $dataModify) ||
                            preg_match('/\.0+$/', $dataChange)
                        ) {
                            $motivos[] = "Motivo 2 - Timestamps com .000 " . basename($arquivo);
                        }
                
                        // Motivo 3 - Modify diferente de Change no arquivo
                        if ($dataModify !== $dataChange) {
                            $motivos[] = "Motivo 3 - Modify diferente de Change no arquivo " . basename($arquivo);
                        }
                
                        // Motivo 4 - Nome do arquivo não bate com Modify
                        if ($indice === 0) {
                            $arquivoMaisRecente = $arquivo;
                        
                            if (preg_match('/(\d{4}-\d{2}-\d{2}-\d{2}-\d{2}-\d{2})/', basename($arquivo), $match)) {
                                $nomeNormalizado = preg_replace(
                                    '/^(\d{4})-(\d{2})-(\d{2})-(\d{2})-(\d{2})-(\d{2})$/',
                                    '$1-$2-$3 $4:$5:$6',
                                    $match[1]
                                );
                                $nomeTimestamp = strtotime($nomeNormalizado);
                        
                                preg_match('/(\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})\.(\d+)/', $dataModify, $modifyParts);
                                $dataModifyBase = $modifyParts[1] ?? '';
                                $nanosModify = (int)($modifyParts[2] ?? 0);
                                $modifyTimestamp = strtotime($dataModifyBase);
                        
                                if ($nomeTimestamp !== false && $modifyTimestamp !== false) {
  
                                    $nomeNsTotal = $nomeTimestamp * 1_000_000_000;
                                    $modifyNsTotal = ($modifyTimestamp * 1_000_000_000) + $nanosModify;
                        
                                    $diffNs = abs($modifyNsTotal - $nomeNsTotal);
                        
                                    if ($diffNs > 1_000_000_000) { 
                                        $motivos[] = "Motivo 4 - Nome do arquivo não bate com Modify: " . basename($arquivo);
                                    }
                                } else {
                                    $motivos[] = "Motivo 4 - erro ao converter timestamps (Modify: $dataModify, Nome: {$match[1]})";
                                }
                            }
                        }
                        
                        
                
                        // Motivo 8 - Access do .json diferente dos tempos do .bin
                  
