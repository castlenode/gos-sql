<?php 
  $minTotalVotingPower = 70;
  $sep = '| '; // false for none

  list($validatorname, $validatoridbyaddr, $blocknumber, $blocknumber70, $chainend, $blocknumber66)
    = globalinit($minTotalVotingPower);

  echo "## Global Block information\n";
  echo " - BlockNumber: $blocknumber\n";
  echo " - BlockNumber70: $blocknumber70 ( ".(int)($blocknumber70*100/$blocknumber)."%)\n";
  foreach($chainend as $item)
    echo " - {$item['chain']} Last: {$item['height']}\n";
  //echo " - BlockNumber66: $blocknumber66 ( need 0 )\n";

  $valmissoff = offmiss($blocknumber);

  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## Cumulative bonded stake ( excluding GoS5 )\n\n";
  $head = array('3:Top', '24:Name', '9:Power');
  $t = 1; $data = array();
  foreach(bondedstake(1, 38900) as $valid => $power) // End of GoS6
    $data[] = array($t++, $validatorname[$valid], $power);
  table($head, $data, 50); /* */


  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## Missed Blocks ( with censorship )\n\n";
  $valmiss70 = blockmiss($valmissoff, $minTotalVotingPower, false);
  $valmiss   = blockmiss($valmissoff, 0, false);
  $head = array('3:Top', '24:Name', '6:66%*', "6:$minTotalVotingPower%", "6:Off"); 
  $t = 1; $data = array();
  foreach($valmiss as $validatorid => $miss)
    $data[] = array($t++, $validatorname[$validatorid], $valmiss[$validatorid],
                    $valmiss70[$validatorid], $valmissoff[$validatorid]);
  table($head, $data, 500); /* */
  

  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## Avg( Missed blocks rankings per 200 blocks windows )( with censorship )\n\n";
  $head = array('3:Top', '24:Name', "6:Miss", "9:AvgMiss", "6:AvgRank");
  $t = 1; $data = array();
  foreach(topavg(200, array()) as $valid => $at)
    $data[] = array($t++, $validatorname[$valid], $at[0], round($at[0]/$at[2], 3),
                    round($at[1]/$at[2], 4));
  table($head, $data, 50); /* */
  

  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## Proposer responsible for most misses per validator\n\n";
  $head = array('24:Name', '24:Proposer', '6:%');
  if(!is_array($valmiss)) $valmiss = blockmiss($valmissoff, 0, false);
  $nextproposer = nextproposermiss(array_slice(array_keys($valmiss), 0, 50));
  $head = array('24:Name', '24:Proposer', '4:%');
  $t = 1; $data = array();
  foreach($nextproposer as $validatorid => $item)
    $data[] = array($validatorname[$validatorid], $validatorname[$item['nextproposerid']],
                    (int)($item['count']*100/$valmiss[$validatorid])."%"); 
  table($head, $data, 50); /* */


  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## List of blocks removed because of censorship\n";
  echo "\n\n### Censure By Validatorich\n\n";
  $censures = array();
  $censures[] = $censure = censure1();
  $head = array('16:Chain', '6:Height');
  $data = array();
  foreach($censure as $chainid => $item)
  {
     foreach(array_chunk($item, 10) as $chunk)
       $data[] = array(getname('chain', $chainid), implode(',', $chunk));
  }
  table($head, $data, 500);

  echo "\n### Censure By Communist\n\n";
  $censures[] = $censure = censure2();
  $data = array();
  foreach($censure as $chainid => $item)
  {
     foreach(array_chunk($item, 10) as $chunk)
       $data[] = array(getname('chain', $chainid), implode(',', $chunk));
  }
  table($head, $data, 500);

  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## Missed Blocks ( without censorship )\n\n";
  $valmiss70 = blockmiss($valmissoff, $minTotalVotingPower, $censures);
  $valmiss = blockmiss($valmissoff, 0, $censures);
  $head = array('3:Top', '24:Name', '6:66%*', "6:$minTotalVotingPower%", "6:Off");
  $t = 1; $data = array();
  foreach($valmiss as $validatorid => $miss)
    $data[] = array($t++, $validatorname[$validatorid], $valmiss[$validatorid],
                    $valmiss70[$validatorid], $valmissoff[$validatorid]);
  table($head, $data, 50); /* */


  //////////////////////////////////////////////////////////////////////////////////
  echo "\n\n## Avg( Missed blocks rankings per 200 blocks windows )( without censorship )\n";
  $head = array('3:Top', '24:Name', "6:Miss", "9:AvgMiss", "6:AvgRank");
  $t = 1; $data = array();
  foreach(topavg(200, $censures) as $valid => $at)
    $data[] = array($t++, $validatorname[$valid], $at[0], round($at[0]/$at[2], 3),
                    round($at[1]/$at[2], 4));
  table($head, $data, 50);


  die();
  //////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////
  
  function table($head, $data, $top)
  { 
    $size = array(); $f = 0;
    foreach($head as $id=>$item)
    {
      list($s, $n) = explode(':', $item, 2);
      $size[$id] = $s;
      echo ($f++==0?'':' | ').str_pad($n, $s);
    }
    echo "\n";

    $f = 0;
    foreach($size as $s)
      echo ($f++==0?'':' | ').str_pad('', $s, '-');
    echo "\n";

    foreach($data as $item)
    {
      if($top--==0) break;
      $f = 0;
      foreach($size as $id=>$s) 
        echo ($f++==0?'':' | ').str_pad($item[$id], $s);
       echo "\n";
    }
  }   

  function query($query, $firstby = false, $by = false) // false=full, true=first, other by
  { global $db;

    //echo "Query: $query\n";
    if(!is_resource($db)) $db = new mysqli('localhost', 'root', 'rootroot', 'gos');

    $res = $db->query($query);
    //echo "$query\n"; var_dump($res);
    if($res === false )
    {
      echo "FailQuery: $query\n";
      return false;
    }
    if($res === true ) return true;
    $return = array();
    while($row = $res->fetch_assoc())
    {
      if($firstby===true) { $return = $row; break; }
      if($firstby!==false) $return[$row[$firstby]] = $row;
        else $return[] = $row;
    }
    $res->free();
    if($by!==false)
    { if(array_key_exists($by, $return)) return($return[$by]);
        return NULL;
    } else return $return;
  }

  function getstring($type, $value)
  {
    $id = query("SELECT id FROM names WHERE type='$type' AND name='$value';", true, 'id');
    if(!$id)
    {
      query("INSERT INTO names (type, name) VALUES ('$type', '$value');");
      $id = query("SELECT id FROM names WHERE type='$type' AND name='$value';", true, 'id');
    }
    if(empty($id)) die("Assert: id of string");
    return $id;
  }
  
  function getname($type, $id)
  { return query("SELECT name FROM names WHERE type='$type' AND id=$id;", true, 'name'); }

  function topavg($step, $censures)
  {
    if(is_array($censures))
    {
      $censureblocks = array();
      foreach($censures as $censure)
        foreach($censure as $chainid => $heights)
          if(count($heights)>0)
      {
        if(array_key_exists($chainid, $censureblocks))
            $censureblocks[$chainid] = array_unique(array_merge($censureblocks[$chainid], $heights));
          else $censureblocks[$chainid] = $heights;
      }
 
      $censures = array();
      if(count($censureblocks)>0)
        foreach($censureblocks as $chainid => $heights)
          foreach($heights as $height)
            $censures[] = "$chainid:$height";
    } 


    $chain = array('game_of_stakes', 'game_of_stakes_3', 'game_of_stakes_5', 'game_of_stakes_6');
    $height = 0;
    $chainid = getstring('chain', array_shift($chain));
    $heightmax = query("SELECT max(height) as max FROM blocks WHERE chainid=$chainid;", true, 'max');
    $count = 0; $subcount = 0;
    $t = time();

    $topid = array_keys(query("SELECT * FROM vals;", 'id'));
    foreach($topid as $valid) { $miss[$count][$valid]=0; $misstotal[$valid]=0; $toptotal[$valid]=0; }

    while(true)
    {
      $height++; $subcount++;
      //echo ">>> H=$height, M=$heightmax, C=$chainid, C=$count, SC=$subcount\n";
      if($height>$heightmax) 
      {
        if(count($chain)==0) break;
        $chainid = getstring('chain', array_shift($chain));
        $heightmax = query("SELECT max(height) as max FROM blocks WHERE chainid=$chainid;", true, 'max');
        $height=1;
      }
      $block = query("SELECT * FROM blocks WHERE chainid=$chainid AND height=$height;", true);
      //$valsets = query("SELECT * FROM blockvals WHERE chainid=$chainid AND height=$height;", "validatorid");
      $valsets = query("SELECT * FROM valsets WHERE id={$block['valsetid']};", "valid");
      foreach($topid as $valid)
        if(!in_array("{$block['chainid']}:{$block['height']}", $censures) &&
           ( !array_key_exists($valid, $valsets) || $valsets[$valid]['miss'] !== "0" ) )
      {
          $miss[$count][$valid]++;
          $misstotal[$valid]++;
      }

      if($subcount>=$step)
      {
        //echo ">>> H=$height, M=$heightmax, C=$chainid, C=$count, SC=$subcount, T=".(time()-$t)."\n";
        asort($miss[$count]);
        $t = 0; $l = false; 
        foreach($miss[$count] as $valid => $m)
        {
          if($l!==$m) { $l = $m; $t++; }
          $top[$count][$valid]=$t;
          $toptotal[$valid]+=$t;
        }
      
        $t = time();
        $subcount = 0;
        $count++;
        foreach($topid as $valid)
          $miss[$count][$valid]=0;
        //if($count>3) break;
      }
    } 
    //echo ">>> H=$height, M=$heightmax, C=$chainid, C=$count, SC=$subcount, T=".(time()-$t)."\n";
    asort($miss[$count]);
    $t = 0; $l = false;
    foreach($miss[$count] as $valid => $m)
    {
      if($l!==$m) { $l = $m; $t++; }
      $top[$count][$valid]=$t;
      $toptotal[$valid]+=$t;
    }
    $count++;

    asort($toptotal);
    foreach($toptotal as $valid=>&$v)
      $v = array($misstotal[$valid], $v, $count);
    return $toptotal;
  }

  function globalinit($minTotalVotingPower)
  {
    $validatorname = query("SELECT * FROM vals;", 'id');
    $validatoridbyaddr = array();
    foreach($validatorname as $id => $item)
    {
       $validatoridbyaddr[$item['addr']] = $id;
       $validatorname[$id] = substr(str_replace(array('_____', '___', '__'), array('_', '_', '_'),
                                  preg_replace("/[^-._0-9a-zA-Z]/", "_", $item['name'])), 0, 24);
    }

    $blocknumber = query("SELECT count(*) as count FROM blocks;", true, 'count');

    // Compute Number of Block 70%
    $blocknumber70 = query("SELECT count(*) as count FROM
                             (SELECT * FROM blocks
                               HAVING ((select sum(power) FROM valsets WHERE blocks.valsetid=valsets.id AND valsets.miss=0)*100
                                         /(select sum(power) FROM valsets WHERE blocks.valsetid=valsets.id)>$minTotalVotingPower)) as blocks;",
                           true, 'count');

    $chainend = query("SELECT names.name as chain, max(height) as height FROM blocks "
                     ."LEFT JOIN names ON blocks.chainid=names.id AND names.type='chain' "
                     ."GROUP BY names.name ORDER BY names.name;");
 
    $blocknumber66 = query("SELECT count(*) as count FROM
                             (SELECT * FROM blocks
                               HAVING ((select sum(power) FROM valsets WHERE blocks.valsetid=valsets.id AND valsets.miss=0)*100
                                         /(select sum(power) FROM valsets WHERE blocks.valsetid=valsets.id)<66)) as blocks;",
                           true, 'count');

    return array($validatorname, $validatoridbyaddr, $blocknumber, $blocknumber70, $chainend, $blocknumber66);
  }
   
  function offmiss($blocknumber)
  { 
    // Compute OffMiss ( miss by out of valset ) // init
    $valsetpresent = query("SELECT validatorid, count(*) as count FROM blockvals GROUP BY validatorid;", 'validatorid');
    $valmiss = array();
    foreach($valsetpresent as $validatorid => $item)
      $valmiss[$validatorid] = $blocknumber - $item['count'];
    asort($valmiss);
    return $valmiss;
  }

  function blockmiss($valmiss, $minTotalVotingPower, $censures)
  {
    if(is_array($censures)) 
    {
      $censureblocks = array();
      foreach($censures as $censure)
        foreach($censure as $chainid => $heights)
          if(count($heights)>0)
      {
        if(array_key_exists($chainid, $censureblocks))
            $censureblocks[$chainid] = array_unique(array_merge($censureblocks[$chainid], $heights));
          else $censureblocks[$chainid] = $heights;
      }

      if(count($censureblocks)>0)
      {
        $where = ' WHERE chainid NOT IN ('.implode(',', array_keys($censureblocks)).')';
        foreach($censureblocks as $chainid => $heights)
            $where .= " OR chainid=$chainid AND height NOT IN (".implode(',', $heights).")";
      } else $where = '';
    } else $where = '';
    
    $blockmiss = query($q="SELECT valsets.valid as validatorid, sum(valsets.miss) as count FROM (SELECT * FROM blocks $where
                           HAVING ((select sum(power) FROM valsets WHERE blocks.valsetid=valsets.id AND valsets.miss=0)*100
                                  /(select sum(power) FROM valsets WHERE blocks.valsetid=valsets.id)>=$minTotalVotingPower)) as blocks
                           INNER JOIN valsets ON blocks.valsetid=valsets.id
                           GROUP BY valsets.valid;", 'validatorid');

    foreach($valmiss as $validatorid => &$miss)
      if(array_key_exists($validatorid, $blockmiss))
        $miss += $blockmiss[$validatorid]['count'];

    asort($valmiss);
    return $valmiss;
  }

  function censure1()
  { global $validatoridbyaddr;
    $badvalid = $validatoridbyaddr['C39B97C2AC4777F9704A297DC17ED629A9AE7FE9'];
    $res = query("SELECT chainid, height
                  FROM blocks 
                  WHERE nextproposerid=$badvalid
                    AND chainid=(select id from names where name='game_of_stakes_6' and type='chain')
                    AND blocktime > '2019-02-14 07:18:56'");
    $censure = array();
    foreach($res as &$item)
      $censure[$item['chainid']][] = $item['height'];
    return $censure;
  }

  function censure2()
  { global $validatoridbyaddr;
    $certus  = $validatoridbyaddr['815D8F7A0688622937758EF9D2778D646EC5854B'];
    $badvalid = $validatoridbyaddr['5F84469FF5BCD99DF00BA920D905565F4258C5B9'];
    $res = query("SELECT chainid, height
                  FROM blocks
                  WHERE nextproposerid=$badvalid
                    AND valsetid IN (SELECT id FROM valsets WHERE valid=$certus AND miss=1);");
    $censure = array();
    foreach($res as &$item)
      $censure[$item['chainid']][] = $item['height'];
    return $censure;
  } 

  function nextproposermiss($vals)
  {
    $nextproposer = array();
    foreach($vals as $id)
      $nextproposer[$id] = query("SELECT nextproposerid, count(*) as count FROM blockvals WHERE validatorid=$id AND miss=1 "
                                ."GROUP BY nextproposerid ORDER BY count(*) DESC LIMIT 1;", true);
    return $nextproposer;
  }

  function bondedstake($chainid, $height)
  {
    $block = query("SELECT * FROM blocks WHERE chainid=$chainid AND height=$height", true);
    $valsets = query("SELECT * FROM valsets WHERE id={$block["valsetid"]};", 'valid');
    $stakes = array();
    foreach($valsets as $valid => $item)
      $stakes[$valid] = $item['power'];
    arsort($stakes);
    return $stakes;
  }
