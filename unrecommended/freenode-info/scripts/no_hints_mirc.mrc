; Bugreports and Licence disclaimer.
;
; For bugreports and other improvements contact Geert Hauwaerts <geert@irssi.org>
;
;    This program is free software; you can redistribute it and/or modify
;    it under the terms of the GNU General Public License as published by
;    the Free Software Foundation; either version 2 of the License, or
;    (at your option) any later version.
;
;    This program is distributed in the hope that it will be useful,
;    but WITHOUT ANY WARRANTY; without even the implied warranty of
;    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
;    GNU General Public License for more details.
;
;    You should have received a copy of the GNU General Public License
;    along with this script; if not, write to the Free Software
;    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
;
;

on 1:CONNECT:{
  /quote version
  /set %dancerIrcd 0 
}

raw 351:*dancer*:/set %dancerIrcd 1

raw 477:*:if (%dancerIrcd == 1){ /halt }
