import os

address = os.path.abspath(os.path.dirname(__file__))
print(address)
os.system('git add .')
os.system('git commit -m "重写详情页，新增关注表，回复表"')
os.system('git push')
os.system('pause')
