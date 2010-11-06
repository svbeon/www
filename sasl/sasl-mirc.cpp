/*
Modified Encoding Function Copyright (c) 2009 Kyle Travaglini
Base64 Function Copyright (c) mr_man

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

Other tools besides base64_encode have been provided as
well; mainly base64_decode :P

*/

#include <windows.h>

#define BASE64_VALUE_SZ 256
#define BASE64_RESULT_SZ 8192

static void base64_init(void);
static int base64_initialized = 0;
int base64_value[BASE64_VALUE_SZ];
const char base64_code[] = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";


static void
base64_init(void)
{
    int i;

    for (i = 0; i < BASE64_VALUE_SZ; i++)
   base64_value[i] = -1;

    for (i = 0; i < 64; i++)
   base64_value[(int) base64_code[i]] = i;
    base64_value['='] = 0;

    base64_initialized = 1;
}

char *
base64_decode(const char *p)
{
    static char result[BASE64_RESULT_SZ];
    int j;
    int c;
    long val;
    if (!p)
   return NULL;
    if (!base64_initialized)
   base64_init();
    val = c = 0;
    for (j = 0; *p && j + 4 < BASE64_RESULT_SZ; p++) {
   unsigned int k = ((unsigned char) *p) % BASE64_VALUE_SZ;
   if (base64_value[k] < 0)
       continue;
   val <<= 6;
   val += base64_value[k];
   if (++c < 4)
       continue;
   result[j++] = (val >> 16) & 0xff;
   result[j++] = (val >> 8) & 0xff;
   result[j++] = val & 0xff;
   val = c = 0;
    }
    result[j] = 0;
    return result;
}

const char *
base64_encode(const char *decoded_str)
{
    static char result[BASE64_RESULT_SZ];
    int bits = 0;
    int char_count = 0;
    int out_cnt = 0;
    int c;

    if (!decoded_str)
   return decoded_str;

    if (!base64_initialized)
   base64_init();

    while ((c = (unsigned char) *decoded_str++) && out_cnt < sizeof(result) - 5) {
   bits += c;
   char_count++;
   if (char_count == 3) {
       result[out_cnt++] = base64_code[bits >> 18];
       result[out_cnt++] = base64_code[(bits >> 12) & 0x3f];
       result[out_cnt++] = base64_code[(bits >> 6) & 0x3f];
       result[out_cnt++] = base64_code[bits & 0x3f];
       bits = 0;
       char_count = 0;
   } else {
       bits <<= 8;
   }
    }
    if (char_count != 0) {
   bits <<= 16 - (8 * char_count);
   result[out_cnt++] = base64_code[bits >> 18];
   result[out_cnt++] = base64_code[(bits >> 12) & 0x3f];
   if (char_count == 1) {
       result[out_cnt++] = '=';
       result[out_cnt++] = '=';
   } else {
       result[out_cnt++] = base64_code[(bits >> 6) & 0x3f];
       result[out_cnt++] = '=';
   }
    }
    result[out_cnt] = '\0';
    return result;
}

const char *
base64_encode_bin(const char *data, int len)
{
    static char result[BASE64_RESULT_SZ];
    int bits = 0;
    int char_count = 0;
    int out_cnt = 0;

    if (!data)
   return data;

    if (!base64_initialized)
   base64_init();

    while (len-- && out_cnt < sizeof(result) - 5) {
   int c = (unsigned char) *data++;
   bits += c;
   char_count++;
   if (char_count == 3) {
       result[out_cnt++] = base64_code[bits >> 18];
       result[out_cnt++] = base64_code[(bits >> 12) & 0x3f];
       result[out_cnt++] = base64_code[(bits >> 6) & 0x3f];
       result[out_cnt++] = base64_code[bits & 0x3f];
       bits = 0;
       char_count = 0;
   } else {
       bits <<= 8;
   }
    }
    if (char_count != 0) {
   bits <<= 16 - (8 * char_count);
   result[out_cnt++] = base64_code[bits >> 18];
   result[out_cnt++] = base64_code[(bits >> 12) & 0x3f];
   if (char_count == 1) {
       result[out_cnt++] = '=';
       result[out_cnt++] = '=';
   } else {
       result[out_cnt++] = base64_code[(bits >> 6) & 0x3f];
       result[out_cnt++] = '=';
   }
    }
    result[out_cnt] = '\0';
    return result;
}


//Base SixtyFour (64) DLL

extern "C" __declspec(dllexport) int __stdcall zencode(HWND mWnd, HWND aWnd, char *data, char *parms, BOOL show, BOOL nopause); 
int WINAPI DllEntryPoint(HINSTANCE hinst, unsigned long reason, void*) { return 1; }

int __stdcall zencode(HWND mWnd, HWND aWnd, char *data, char *parms, BOOL show, BOOL nopause)
{
    char *toEncode = data;
    int i;
    size_t len = strlen(data);
    for (i = 0; i < len; i++) if (toEncode[i] == ' ') toEncode[i] = '\0';
   strcpy(data,base64_encode_bin(toEncode, len));
   return 3;
}
