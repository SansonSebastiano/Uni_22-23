from collections import Counter

text = "MKXU IDKMI DM BDASKMI NLU XCPJNDICFQ! K VDMGUC KW PDT GKG NLKB HP LFMG DC TBUG PDTC CUBDTCXUB. K'Q BTCU MDV PDT VFMN F WAFI BD LUCU KN KB WAFI GDKMINLKBHPLFMGKBQDCUWTMNLFMFMDMAKMUNDDA"

# get the frequency of characters

res = Counter(text)

print(str(res))

# map it somehow
mapping = {'K' : 'i'}
dec = ''.join(c if c not in mapping else mapping[c] for c in text)
print(mapping, '\n' ,dec)

# che palle