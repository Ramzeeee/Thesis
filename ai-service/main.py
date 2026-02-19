from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

@app.get("/health")
def health():
    return {"status": "AI service working"}

class Message(BaseModel):
    message: str

@app.post("/chat")
def chat(data: Message):
    return {"reply": f"You said: {data.message}"}
