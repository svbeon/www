/*
mSASL Version 1.0 Beta designed by Kyle Travaglini
  * To use this script you must have the proper DLL
  * All I ask is you leave the credit line within the
     main dialog
  * PLEASE read the SASLreadme.txt file before asking
     questions!
*/

alias shname { return SASL }
alias shfile { return SASL.hsh }
alias SASL {
  if ($isid) {
    if ($prop == nlist) { return $hget($shname,NLIST) }
    if ($prop == timeout) { return $hget($shname,$+($1,:TIMEOUT)) }
    if ($prop == user) { return $hget($shname,$+($1,:USER)) }
    if ($prop == passwd) { return $hget($shname,$+($1,:PASSWD)) }
    if ($prop == domain) { return $hget($shname,$+($1,:DOMAIN)) }
    if ($prop == realname) { return $hget($shname,$+($1,:REALNAME)) }
    if ($prop == status) { return $hget($shname,$+($1,:STATUS)) }
    if ($prop == authtype) { return $hget($shname,$+($1,:AUTHTYPE)) }
  }
}
alias sd { hadd -m $shname $+($1,:,$2) $3- }

on *:START:{
  if (!$exists(SASL.hsh)) { hmake $shname 50 }
  else { hload $shname $shfile }
}

on ^*:LOGON:*:{
  if ($network isin $SASL($network).nlist) {
    .quote CAP LS
    .quote NICK $nick
    .quote USER $SASL($network).user $SASL($network).domain 1 : $+ $SASL($network).realname
    sd $network STATUS Connecting
    halt
  }
}

raw CAP:*LS*:{ .quote CAP REQ :multi-prefix sasl }
raw CAP:*ACK*:{ .quote AUTHENTICATE PLAIN }
raw AUTHENTICATE:+:{ .quote AUTHENTICATE $dll(SASL.dll,zencode,$SASL($network).user $SASL($network).user $SASL($network).passwd) }
raw *:*:{
  if ($numeric isnum 903-907) { .quote CAP END }
}

dialog SASL.main {
  title "SASL Manager"
  size -1 -1 150 145
  option dbu
  box "Server List" 1, 5 3 140 113
  text "Created by Kyle Travaglini" 3, 40 135 65 12
  list 4, 10 13 80 104, vsbar, edit
  button "Add" 5, 96 13 43 12
  button "Edit" 6, 96 30 43 12
  button "Delete" 7, 96 47 43 12
  button "OK" 8, 27 120 43 12, ok
  button "Update SASL" 9, 77 120 43 12
}

dialog SASL.edit {
  title "Network Configuration"
  size -1 -1 150 120
  option dbu
  box "Network Settings" 1, 5 3 140 97
  text "Network:" 2, 10 13 36 10, right
  edit "" 3, 48 12 92 10
  text "Username:" 4, 10 25 36 10, right
  edit "" 5, 48 24 92 10
  text "NS Password:" 6, 10 37 36 10, right
  edit "" 7, 48 36 92 10
  text "Domain:" 8, 10 49 36 10, right
  edit "" 9, 48 48 92 10
  text "Real Name:" 10, 10 61 36 10, right
  edit "" 11, 48 60 92 10
  text "Timeout:" 12, 10 73 36 10, right
  edit "" 13, 48 72 92 10
  text "AuthType:" 14, 10 85 36 10, right
  edit "" 15, 48 84 92 10
  button "OK" 16, 27 105 43 12, ok
  button "Cancel" 17, 77 105 43 12, cancel
}

dialog SASL.deletewarn {
  title "SASL"
  size -1 -1 120 40
  option dbu
  text "You must specify a network to delete." 1, 13 5 100 10
  button "OK" 2, 40 20 43 12, ok
}

dialog SASL.editwarn {
  title "SASL"
  size -1 -1 120 40
  option dbu
  text "You must specify a network to edit." 1, 13 5 100 10
  button "OK" 2, 40 20 43 12, ok
}

on *:DIALOG:SASL.*:*:*:{
  if ($dname == SASL.main) {
    if ($devent == init) {
      did -r $dname 3
      did -a $dname 3 $decode(Q3JlYXRlZCBieSBLeWxlIFRyYXZhZ2xpbmk=,m)
      var %net_iter = 1
      while (%net_iter <= $numtok($SASL().nlist,44)) {
        did -a $dname 4 $gettok($SASL().nlist,%net_iter,44)
        inc %net_iter 1      
      }
    }
    if ($devent == sclick) {
      if ($did == 5) { dialog -m SASL.edit SASL.edit }
      elseif ($did == 6) {
        if ($did($dname,4).seltext) {
          hadd -m $shname EDIT True
          dialog -m SASL.edit SASL.edit
        }
        else { dialog -m SASL.deletewarn SASL.deletewarn }
      }
      elseif ($did == 7) {
        if ($did($dname,4).sel) {
          if ($?!="Are you certain you wish to delete $did($dname,4).seltext $+ ?") {
            hdel -w $shname $+($did($dname,4).seltext,:*)
            hadd -m $shname NLIST $remtok($SASL().nlist,$did($dname,4).seltext,1,44)
            did -d $dname 4 $did($dname,4).sel
          }
        }
        else { dialog -m SASL.deletewarn SASL.deletewarn }
      }
      elseif ($did == 9) { usasl } 
    }
  }
  elseif ($dname == SASL.edit) {
    if ($devent == init) {
      if ($hget($shname,EDIT) == True) {
        var %network = $did(SASL.main,4).seltext
        did -a $dname 3 %network
        did -a $dname 5 $SASL(%network).user
        did -a $dname 7 $SASL(%network).passwd
        did -a $dname 9 $SASL(%network).domain
        did -a $dname 11 $SASL(%network).realname
        did -a $dname 13 $SASL(%network).timeout
        did -a $dname 15 $SASL(%network).authtype
      }
    }
    if ($devent == sclick) {
      if ($did == 16) {
        var %network = $did($dname,3)
        if ($hget($shname,EDIT) == True) { hadd -m $shname NLIST $remtok($SASL().nlist,%network,1,44) }
        else {
          if ($findtok($SASL().nlist,%network,1,44)) {
            if ($?!=" $+ %network already exists; overwrite?") {
              hadd -m $shname NLIST $remtok($SASL().nlist,%network,1,44)
            }
            else { halt }
          }
        }
        hdel $shname EDIT
        hadd -m $shname NLIST $+($SASL().nlist,$chr(44),%network)
        sd %network USER $did($dname,5)
        sd %network PASSWD $did($dname,7)
        sd %network DOMAIN $did($dname,9)
        sd %network REALNAME $did($dname,11)
        sd %network TIMEOUT $did($dname,13)
        sd %network AUTHTYPE $did($dname,15)
        var %net_iter = 1
        did -r SASL.main 4
        while (%net_iter <= $numtok($SASL().nlist,44)) {
          did -a SASL.main 4 $gettok($SASL().nlist,%net_iter,44)
          inc %net_iter 1      
        }
      }
    }
  }
}
;;

f2 { dialog -m SASL.main SASL.main }

